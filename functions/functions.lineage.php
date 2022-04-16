<?php 

    
    /** assembels an html string of the item lineage t
     *
     * @param  mixed $item_events results of DatabaseConnector::getItemEvents($item_data[ITEM_TABLE_ID])
     * @return string
     */
    function drawLineage($item_events){
        $_r = '
          <div class="container mx-auto w-full h-full">
            <div class="relative wrap overflow-hidden p-10 h-full">
              <div class="border-2-2 absolute border-opacity-20 border-gray-700 h-full border" style="left: 50%">
              </div>
        ';
        foreach($item_events as $item_event){
          $type = extractEventDescriptionData($item_event[EVENT_TABLE_EVENT_DESCRIPTION], EVENT_TABLE_DESCRIPTION_EVENT_TYPE);
          switch($type){
            case EVENT_SAVED_ITEM_ADDED:
              $body = timelineItemAddedBody($item_event[EVENT_TABLE_EVENT_DESCRIPTION]);
              $content = timelineReducer($item_event, $body);
              $_r = $_r.rightTimeline($content);
              break;
            case EVENT_SAVED_ITEM_LISTED:
              $body = timelineItemListedBody($item_event[EVENT_TABLE_EVENT_DESCRIPTION]);
              $content = timelineReducer($item_event, $body);
              $_r = $_r.leftTimeline($content);
              break;
            case EVENT_SAVED_ITEM_DELISTED:
              $body = timelineItemDelistedBody($item_event[EVENT_TABLE_EVENT_DESCRIPTION]);
              $content = timelineReducer($item_event, $body);
              $_r = $_r.leftTimeline($content);
              break;
            case EVENT_SAVED_ITEM_UPDATED:
              $body = timelineItemUpdatedBody($item_event[EVENT_TABLE_EVENT_DESCRIPTION]);
              $content = timelineReducer($item_event, $body);
              $_r = $_r.leftTimeline($content);
              break;
            case EVENT_SAVED_ITEM_PURCHASED:
              $body = timelineItemDelistedBody($item_event[EVENT_TABLE_EVENT_DESCRIPTION]);
              $content = timelineReducer($item_event, $body);
              $_r = $_r.rightTimeline($content);
              break;
            case EVENT_SAVED_UPGRADED:
              $body = timelineItemUpdatedBody($item_event[EVENT_TABLE_EVENT_DESCRIPTION]);
              $content = timelineReducer($item_event, $body);
              $_r = $_r.leftTimeline($content);
              break;
            case EVENT_SAVED_REPAIRED:
              $body = timelineItemUpdatedBody($item_event[EVENT_TABLE_EVENT_DESCRIPTION]);
              $content = timelineReducer($item_event, $body);
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
     * @param  mixed $description should use $item_event[EVENT_TABLE_EVENT_DESCRIPTION]
     * @return string item added message
     */
    function timelineItemAddedBody($description){
      console($description);
      $price = extractEventDescriptionData($description, EVENT_TABLE_DESCRIPTION_CURRENT_PRICE);
      $original_purchase_date = extractEventDescriptionData($description, EVENT_TABLE_DESCRIPTION_ORIGINAL_PURCHASE_DATE);
      $original_owner = extractEventDescriptionData($description, EVENT_TABLE_DESCRIPTION_ORIGINAL_OWNER);
      $original_purchase_price = extractEventDescriptionData($description, EVENT_TABLE_DESCRIPTION_ORIGINAL_PURCHASE_PRICE);
      return '
        original owner: '.$original_owner.'<br>
        original purchase date: '.$original_purchase_date.'<br>
        original purchase price: '.$original_purchase_price.'<br>
        initial sales price: '.$price
      ;
    }

    
    /** parses event description column contents for item listed message
     *
     * @param  mixed $description should use $item_event[EVENT_TABLE_EVENT_DESCRIPTION]
     * @return string item listed message
     */
    function timelineItemListedBody($description){
      return 'item listed for sale';
    }

    
    /** parses event description column contents for item delisted message
     *
     * @param  mixed $description should use $item_event[EVENT_TABLE_EVENT_DESCRIPTION]
     * @return string item delisted message
     */
    function timelineItemDelistedBody($description){
      return 'item delisted for sale';
    }

    
    /** parses event description column contents for update item message
     *
     * @param  mixed $description should use $item_event[EVENT_TABLE_EVENT_DESCRIPTION]
     * @return string update item message
     */
    function timelineItemUpdatedBody($description){
      $date = extractEventDescriptionData($description, EVENT_TABLE_DESCRIPTION_DATE);
      $cost = extractEventDescriptionData($description, EVENT_TABLE_DESCRIPTION_COST);
      $description = extractEventDescriptionData($description, EVENT_TABLE_DESCRIPTION_CUSTOM_DESCRIPTION);
      return '
        Date: '.$date.'<br>
        Cost: '.$cost.'<br>
        Description: '.$description
      ;
    }

    
    /** assembles data for timeline event draw functions
     *
     * @param  mixed $item_event from EVENT_SAVED_...
     * @param  mixed $event_body message to go in the timeline event box. use return from timelineItem[OPERATION]Body() function
     * @return mixed
     */
    function timelineReducer($item_event, $event_body){
      $type = extractEventDescriptionData($item_event[EVENT_TABLE_EVENT_DESCRIPTION], EVENT_TABLE_DESCRIPTION_EVENT_TYPE);
      $bubble = encodeEventType($type);
      $event_title = strtoupper($type).'<br>'.$item_event[EVENT_TABLE_TIMESTAMP];
      return array(
        TIMELINE_REDUCER_BUBBLE => $bubble,
        TIMELINE_REDUCER_TITLE => $event_title,
        TIMELINE_REDUCER_BODY => $event_body
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
        case EVENT_SAVED_ITEM_ADDED:
          return 'AD';
          break;
        case EVENT_SAVED_ITEM_LISTED:
          return 'LI';
          break;
        case EVENT_SAVED_ITEM_UPDATED:
          return 'UD';
          break;
        case EVENT_SAVED_ITEM_DELISTED:
          return 'DL';
          break;
        case EVENT_SAVED_ITEM_PURCHASED:
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

    
    /** extracts data from description column in event table. the description column is used as a generic datamap for different event types
     *
     * @param  mixed $description contents of orders table description column
     * @param  mixed $key the key in the contents you are looking for, use EVENT_TABLE_DESCRIPTION_...
     * @return string
     */
    function extractEventDescriptionData($description, $key){
      parse_str($description, $_r);
      return $_r[$key];
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