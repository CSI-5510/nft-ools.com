<?php
    // FRONTEND
    include('../functions/functions.add_item.php');
?>

<form method="POST" action="/<?php echo $GLOBALS['url_loc'][0];?>/collector/add_item" enctype="multipart/form-data">
    <div class="flex flex-row items-start">
        <?php
            drawLabel('TITLE', $LISTING_LABEL);
            drawTextInput('title', $LISTING_INPUT_AREA);
        ?>
    </div>
    <div class="flex flex-row justify-between items-start">
        <?php
            drawLabel('CATEGORY', $LISTING_LABEL);
            drawSelectOption('category', $LISTING_INPUT_AREA, $options);
        ?>
    </div>
    <div class="flex flex-row justify-between items-start">
        <?php
            drawLabel('DESCRIPTION', $LISTING_LABEL);
            drawTextArea('description', $LISTING_INPUT_AREA);
        ?>
    </div>
    <div class="flex flex-row justify-between items-start">
        <?php
            drawLabel('IMAGE', $LISTING_LABEL);
            drawFileUpload('image', 'image', $LISTING_DROPZONE, $ACCEPTED_IMAGE_TYPES);
        ?>
    </div>
    <div class="flex flex-row justify-between items-start">
        <?php
            drawLabel('DOCUMENTATION', $LISTING_LABEL);
            drawFileUpload('documentation', 'documentation', $LISTING_DROPZONE, $ACCEPTED_IMAGE_TYPES);
        ?>
    </div>
    <div class="flex flex-row justify-between items-start">
        <?php
            drawLabel('RECEIPT', $LISTING_LABEL);
            drawFileUpload('receipt', 'receipt', $LISTING_DROPZONE, $ACCEPTED_IMAGE_TYPES);
            ?>
    </div>
    <div class="flex flex-row justify-between items-start">
        <?php
            drawLabel('PURCHASE DATE', $LISTING_LABEL);
            drawDateInput('original_purchase_date', $LISTING_INPUT_AREA);
        ?>
    </div>
    <div class="flex flex-row justify-between items-start">
        <?php
            drawLabel('PURCHASE PRICE', $LISTING_LABEL);
            drawTextInput('original_price', $LISTING_INPUT_AREA);
        ?>
    </div>
    <div class="flex flex-row justify-between items-start">
        <?php
            drawLabel('AFFIDAVIT OF QUALITY', $LISTING_LABEL);
            drawAffidavit('title', 'i gaurantee that this thing works...');
        ?>
    </div>
    <div class="flex flex-row justify-between items-start">
        <?php
            drawSubmitButton($BLUE_BUTTON." mx-40 my-10 w-full");
        ?>
    </div>
</form>