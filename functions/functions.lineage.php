<?php 

    
    /** assembels an html string of the item lineage t
     * @param  mixed $item_data
     * @param  mixed $order_data
     * @param  mixed $event_data results of DatabaseConnector::getItemEvents($item_data[ITEM_TABLE_ID])
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
            case EVENT_TYPE_ADDED:
              $content = addedReducer($item_data, $event);
              $_r = $_r.rightTimeline($content);
              break;
            case EVENT_TYPE_LISTED:
              $content = listedReducer($item_data, $order_data, $event);
              $_r = $_r.leftTimeline($content);
              break;
            case EVENT_TYPE_DELISTED:
              $content = delistedReducer($item_data, $order_data, $event);
              $_r = $_r.leftTimeline($content);
              break;
            case EVENT_TYPE_UPDATED:
              $content = updatedReducer($item_data, $order_data, $event);
              $_r = $_r.leftTimeline($content);
              break;
            case EVENT_TYPE_PURCHASED:
              $content = purchasedReducer($item_data, $order_data, $event);
              $_r = $_r.rightTimeline($content);
              break;
            case EVENT_SAVED_UPGRADED:
              $content = upgradedReducer($item_data, $order_data, $event);
              $_r = $_r.leftTimeline($content);
              break;
            case EVENT_SAVED_REPAIRED:
              $content = repairedReducer($item_data, $order_data, $event);
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

  function listedReducer($item_data, $order_data, $event){
    $bubble = encodeEventType($event[EVENT_TYPE_ADDED]);
    $original_purchase_date = '';
    $title = strtoupper($event[EVENT_TABLE_TYPE]).'<br>'.$original_purchase_date;
    $price = '';
    $original_owner = '';
    $original_purchase_price = '';
    $body = '';
    ;
    return array(
      TIMELINE_REDUCER_BUBBLE => $bubble,
      TIMELINE_REDUCER_TITLE => $title,
      TIMELINE_REDUCER_BODY => $body
    );
  }  


  function delistedReducer($item_data, $order_data, $event){
    $bubble = encodeEventType($event[EVENT_TABLE_TYPE]);
    $original_purchase_date = '';
    $title = strtoupper($event[EVENT_TABLE_TYPE]).'<br>'.$original_purchase_date;
    $price = '';
    $original_purchase_date = '';
    $original_owner = '';
    $original_purchase_price = '';
    $body = '';
    ;
    return array(
      TIMELINE_REDUCER_BUBBLE => $bubble,
      TIMELINE_REDUCER_TITLE => $title,
      TIMELINE_REDUCER_BODY => $body
    );
  }  


  function updatedReducer($item_data, $order_data, $event){
    $bubble = encodeEventType($event[EVENT_TABLE_TYPE]);
    $original_purchase_date = '';
    $title = strtoupper($event[EVENT_TABLE_TYPE]).'<br>'.$original_purchase_date;
    $price = '';
    $original_owner = '';
    $original_purchase_price = '';
    $body = '';
    ;
    return array(
      TIMELINE_REDUCER_BUBBLE => $bubble,
      TIMELINE_REDUCER_TITLE => $title,
      TIMELINE_REDUCER_BODY => $body
    );
  }  


  function purchasedReducer($item_data, $order_data, $event){
    $bubble = encodeEventType($event[EVENT_TABLE_TYPE]);
    $original_purchase_date = '';
    $title = strtoupper($event[EVENT_TABLE_TYPE]).'<br>'.$original_purchase_date;
    $price = '';
    $original_purchase_date = '';
    $original_owner = '';
    $original_purchase_price = '';
    $body = '';
    ;
    return array(
      TIMELINE_REDUCER_BUBBLE => $bubble,
      TIMELINE_REDUCER_TITLE => $title,
      TIMELINE_REDUCER_BODY => $body
    );
  }  
    

  function upgradedReducer($item_data, $order_data, $event){
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


  function repairedReducer($item_data, $order_data, $event){
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
        case EVENT_TYPE_ADDED:
          return 'AD';
          break;
        case EVENT_TYPE_LISTED:
          return 'LI';
          break;
        case EVENT_TYPE_UPDATED:
          return 'UD';
          break;
        case EVENT_TYPE_DELISTED:
          return 'DL';
          break;
        case EVENT_TYPE_PURCHASED:
          return 'PR';
          break;
        case EVENT_SAVED_UPGRADED:
          return 'UG';
          break;
        case EVENT_SAVED_REPAIRED:
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