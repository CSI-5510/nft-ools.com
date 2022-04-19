<?php 

    
  /** assembels an html string of the item lineage t
   * @param  mixed $item_data
   * @param  mixed $order_data
   * @param  mixed $event_data results of DatabaseConnector::getItemEvents($item_data[ITEM_TABLE_I_ID])
   * @return string
   */
  function drawLineage($item_data, $order_data, $event_data){
      $_r = '
        <div class="container mx-auto w-full h-full">
          <div class="relative wrap overflow-hidden p-10 h-full">
            <div class="border-2-2 absolute border-opacity-20 border-gray-700 h-full border" style="left: 50%">
            </div>
      ';
      foreach($event_data as $event){
        $type = $event[EVENT_TABLE_TYPE];
        switch($type){
          case EVENT_TYPE_ADDED_TO_SYSTEM:
            $content = addedReducer($item_data, $event);
            $_r = $_r.rightTimeline($content);
            break;
          case EVENT_TYPE_LISTED_FOR_SALE:
            $content = listedReducer($item_data, $event);
            $_r = $_r.leftTimeline($content);
            break;
          case EVENT_TYPE_DELISTED_FROM_SALE:
            $content = delistedReducer($item_data, $event);
            $_r = $_r.leftTimeline($content);
            break;
          case EVENT_TYPE_SOLD:
            $content = purchasedReducer($item_data, $order_data, $event);
            $_r = $_r.rightTimeline($content);
            break;
          case EVENT_TYPE_IN_CART:
            $content = cartReducer($item_data, $order_data, $event);
            $_r = $_r.rightTimeline($content);
            break;
          case EVENT_TYPE_UPGRADED:
            $content = upgradedReducer($event);
            $_r = $_r.leftTimeline($content);
            break;
          case EVENT_TYPE_REPAIRED:
            $content = repairedReducer($event);
            $_r = $_r.leftTimeline($content);
            break;
        }
      }
      $_r = $_r.'
          </div>
        </div>
      ';
      return $_r;
  }

    
  /** parses event description column contents for item added message
   *
   * @param  mixed $description should use $item_event[ORDER_TABLE_EVENT_DESCRIPTION]
   * @return string item added message
   */
  function addedReducer($item_data, $event){
    $bubble = encodeEventType($event[EVENT_TABLE_TYPE]);
    $original_purchase_date = $item_data[ITEM_TABLE_ORIGINAL_PURCHASE_DATE];
    $title = strtoupper($event[EVENT_TABLE_TYPE]).'<br>'.$original_purchase_date;
    $price = $item_data[ITEM_TABLE_CURRENT_PRICE];
    $name = DatabaseConnector::getUserFullName($item_data[ITEM_TABLE_OWNER_ID]);
    $original_owner = $name[USER_TABLE_FIRST_NAME].' '.$name[USER_TABLE_LAST_NAME];
    $original_purchase_price = $item_data[ITEM_TABLE_ORIGINAL_PRICE];
    $body = '
      original owner: '.$original_owner.'<br>
      original purchase date: '.$original_purchase_date.'<br>
      original purchase price: $'.$original_purchase_price.'<br>
      initial sales price: $'.$price
    ;
    return array(
      TIMELINE_REDUCER_BUBBLE => $bubble,
      TIMELINE_REDUCER_TITLE => $title,
      TIMELINE_REDUCER_BODY => $body
    );
  }


  function listedReducer($item_data, $event){
    $bubble = encodeEventType($event[EVENT_TABLE_TYPE]);
    $date = $event[EVENT_TABLE_TIMESTAMP];
    $title = strtoupper($event[EVENT_TABLE_TYPE]).'<br>'.$date;
    $price = $item_data[ITEM_TABLE_ORIGINAL_PRICE];
    $name = DatabaseConnector::getUserFullName($item_data[ITEM_TABLE_OWNER_ID]);
    $name = $name[USER_TABLE_FIRST_NAME].' '.$name[USER_TABLE_LAST_NAME];
    $body = '
      listed by: '.$name.'<br>
      for amount: $'.$price
    ;
    return array(
      TIMELINE_REDUCER_BUBBLE => $bubble,
      TIMELINE_REDUCER_TITLE => $title,
      TIMELINE_REDUCER_BODY => $body
    );
  }  


  function delistedReducer($item_data, $event){
    $bubble = encodeEventType($event[EVENT_TABLE_TYPE]);
    $date = $event[EVENT_TABLE_TIMESTAMP];
    $title = strtoupper($event[EVENT_TABLE_TYPE]).'<br>'.$date;
    $price = $item_data[ITEM_TABLE_ORIGINAL_PRICE];
    $name = DatabaseConnector::getUserFullName($item_data[ITEM_TABLE_OWNER_ID]);
    $name = $name[USER_TABLE_FIRST_NAME].' '.$name[USER_TABLE_LAST_NAME];
    $body = '
      delisted by: '.$name.'<br>
      for amount: $'.$price
    ;
    return array(
      TIMELINE_REDUCER_BUBBLE => $bubble,
      TIMELINE_REDUCER_TITLE => $title,
      TIMELINE_REDUCER_BODY => $body
    );
  }  


  function purchasedReducer($item_data, $order_data, $event){
    $bubble = encodeEventType($event[EVENT_TABLE_TYPE]);
    $date = $event[EVENT_TABLE_TIMESTAMP];
    $title = strtoupper($event[EVENT_TABLE_TYPE]).'<br>'.$date;
    $purchase_price = $order_data[EVENT_TABLE_AGREEMENT_PRICE];
    $purchaser_name = DatabaseConnector::getUserFullName($order_data[ORDER_TABLE_BUYER_ID]);
    $purchaser_name = $purchaser_name[USER_TABLE_FIRST_NAME].' '.$purchaser_name[USER_TABLE_LAST_NAME];
    $body = '
      purchaser: '.$purchaser_name.'<br>
      purchase price: '.$purchase_price.'<br>
    ';
    return array(
      TIMELINE_REDUCER_BUBBLE => $bubble,
      TIMELINE_REDUCER_TITLE => $title,
      TIMELINE_REDUCER_BODY => $body
    );
  } 

  function cartReducer($item_data, $order_data, $event){
    $bubble = encodeEventType($event[EVENT_TABLE_TYPE]);
    $date = $event[EVENT_TABLE_TIMESTAMP];
    $title = strtoupper($event[EVENT_TABLE_TYPE]).'<br>'.$date;
    $bid = $order_data[EVENT_TABLE_AGREEMENT_PRICE];
    $bidder_name = DatabaseConnector::getUserFullName($order_data[ORDER_TABLE_BUYER_ID]);
    $bidder_name = $bidder_name[USER_TABLE_FIRST_NAME].' '.$bidder_name[USER_TABLE_LAST_NAME];
    $body = '
      bidder: '.$bidder_name.'<br>
      agreed price: '.$bid.'<br>
    ';
    return array(
      TIMELINE_REDUCER_BUBBLE => $bubble,
      TIMELINE_REDUCER_TITLE => $title,
      TIMELINE_REDUCER_BODY => $body
    );
  } 
    

  function upgradedReducer($event){
    $bubble = encodeEventType($event[EVENT_TABLE_TYPE]);
    $date = $event[EVENT_TABLE_TIMESTAMP];
    $title = strtoupper($event[EVENT_TABLE_TYPE]).'<br>'.$date;
    $cost = $event[EVENT_TABLE_COST];
    $event_date = $event[EVENT_TABLE_DATE];
    $description = $event[EVENT_TABLE_DESCRIPTION];
    $body = '
      upgrade date: '.$event_date.'<br>
      upgrade cost: $'.$cost.'<br>
      description: '.$description
    ;
    return array(
      TIMELINE_REDUCER_BUBBLE => $bubble,
      TIMELINE_REDUCER_TITLE => $title,
      TIMELINE_REDUCER_BODY => $body
    );
  }  


  function repairedReducer($event){
    $bubble = encodeEventType($event[EVENT_TABLE_TYPE]);
    $date = $event[EVENT_TABLE_TIMESTAMP];
    $title = strtoupper($event[EVENT_TABLE_TYPE]).'<br>'.$date;
    $cost = $event[EVENT_TABLE_COST];
    $event_date = $event[EVENT_TABLE_DATE];
    $description = $event[EVENT_TABLE_DESCRIPTION];
    $body = '
      upgrade date: '.$event_date.'<br>
      upgrade cost: $'.$cost.'<br>
      description: '.$description
    ;
    return array(
      TIMELINE_REDUCER_BUBBLE => $bubble,
      TIMELINE_REDUCER_TITLE => $title,
      TIMELINE_REDUCER_BODY => $body
    );
  }  


    /** encodes the event type into a two letter symbol for display in timeline
     *
     * @param  string $type the event type from the orders table description column
     * @return string 
     */
    function encodeEventType($type){
      switch($type){
        // yes the breaks are redundant. dont worry about it.
        case EVENT_TYPE_ADDED_TO_SYSTEM:
          return 'AD';
          break;
        case EVENT_TYPE_LISTED_FOR_SALE:
          return 'LI';
          break;
        case EVENT_TYPE_DELISTED_FROM_SALE:
          return 'DL';
          break;
        case EVENT_TYPE_SOLD:
          return 'PR';
          break;
        case EVENT_TYPE_UPGRADED:
          return 'UG';
          break;
        case EVENT_TYPE_REPAIRED:
          return 'RP';
          break;
      }
    }

    
    /** assembeles a string with html for an event box on the right side of the timeline
     *
     * @param  mixed $content
     * @return void
     */
    function rightTimeline($content){
        return '
          <div class="mb-8 flex justify-between items-center w-full right-timeline">
            <div class="order-1 w-5/12">
            </div>
            <div class="z-20 flex items-center order-1 bg-gray-800 shadow-xl w-8 h-8 rounded-full">
              <h1 class="mx-auto font-semibold text-lg text-white">
                '.$content[TIMELINE_REDUCER_BUBBLE].'
              </h1>
            </div>
            <div class="order-1 bg-gray-400 rounded-lg shadow-xl w-5/12 px-6 py-4">
              <h3 class="mb-3 font-bold text-gray-800 text-xl">
                '.$content[TIMELINE_REDUCER_TITLE].'
              </h3>
              <p class="text-sm leading-snug tracking-wide text-gray-900 text-opacity-100">
                '.$content[TIMELINE_REDUCER_BODY].'
              </p>
            </div>
          </div>
        ';
    }

    
    /** assembeles a string with html for an event box on the left side of the timeline
     *
     * @param  mixed $content
     * @return string
     */
    function leftTimeline($content){
        return '
          <div class="mb-8 flex justify-between flex-row-reverse items-center w-full left-timeline">
            <div class="order-1 w-5/12">
            </div>
            <div class="z-20 flex items-center order-1 bg-gray-800 shadow-xl w-8 h-8 rounded-full">
              <h1 class="mx-auto text-white font-semibold text-lg">
                '.$content[TIMELINE_REDUCER_BUBBLE].'
              </h1>
            </div>
            <div class="order-1 bg-red-400 rounded-lg shadow-xl w-5/12 px-6 py-4">
              <h3 class="mb-3 font-bold text-white text-xl">
                '.$content[TIMELINE_REDUCER_TITLE].'
              </h3>
              <p class="text-sm font-medium leading-snug tracking-wide text-white text-opacity-100">
                '.$content[TIMELINE_REDUCER_BODY].'
              </p>
            </div>
          </div>
        ';
    }


?>