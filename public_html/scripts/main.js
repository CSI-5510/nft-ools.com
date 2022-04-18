/** removes this node and all child nodes
 * @returns void removes node(s) from dom
 */
function removeThis(){
    _node = document.getElementById('alert');
    removeAllChildren(_node);
    _node.remove();
    return;
}


/**
 * @param  {HTMLElement} node the node whose children you want removed
 * @returns void removes nodes from dom
 */
function removeAllChildren(node){
    while(node.firstChild){
        node.removeChild(node.firstChild);
    }
    return;
}


function isValid(node){
  node.style.backgroundColor='lightgreen';
  document.getElementById('submit').disabled = false;
  return;
}


function isInvalid(node){
  node.style.backgroundColor='lightcoral';
  document.getElementById('submit').disabled = true;
  return;
}

function isValidEmail(node){
 if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(node.value))
  {
    isInvalid(node);
    return;
  }
  isValid(node);
  return;
}


function notBlank(node){
  var value = node.value;
  if(value.length == 0){
    isInvalid(node);
    return;
  }
  isValid(node);
  return;
}


function isValidUSZip(node) {
  var zip = node.value;
  var test = /^\d{5}(-\d{4})?$/.test(zip);
  if(!test){
    isInvalid(node);
    return;
  }
  isValid(node);
  return;
}


function isValidPhoneNumber(node) {
  var phone = node.value;
  var test = /^[0-9]+$/.test(phone);
  if(!test){
    node.value = node.value.slice(0,-1);
  }
  if(phone.length<10){
    isInvalid(node);
    return;
  }
  isValid(node);
  return;
}


function performSearch(node, event){
  console.log(event.keyCode);
  if (event.keyCode === 13) {
      document.location.href = "/public_html/search/"+node.value;
  }
}




/** adds each item to buffer
 * @param  {Event} ev event
 * @returns void file system operation
 */
function dropHandler(ev) {
    console.log('File(s) dropped');
  
    // Prevent default behavior (Prevent file from being opened)
    ev.preventDefault();
  
    if (ev.dataTransfer.items) {
      // Use DataTransferItemList interface to access the file(s)
      for (var i = 0; i < ev.dataTransfer.items.length; i++) {
        // If dropped items aren't files, reject them
        if (ev.dataTransfer.items[i].kind !== 'file') {
            continue;
        }
        // process files
        var file = ev.dataTransfer.items[i].getAsFile();
        console.log('... file[' + i + '].name = ' + file.name);
      }
      return;
    }
      
    // Use DataTransfer interface to access the file(s)
    for (var i = 0; i < ev.dataTransfer.files.length; i++) {
        console.log('... file[' + i + '].name = ' + ev.dataTransfer.files[i].name);
    }
    return;

  }


/** overrides browser drageOverHandler
 * @param  {Event} ev event
 * @returns void prints to console
 */
function dragOverHandler(ev) {
    console.log('File(s) in drop zone');
    // Prevent default behavior (Prevent file from being opened)
    ev.preventDefault();
}


/** adds image thumbnail to HTML input element
 * @returns void draws to page
 */
function updateImageDisplay(node) {
    
    var preview = document.getElementById(this.id+'_preview');

    while(preview.firstChild) {
      preview.removeChild(preview.firstChild);
    }

    const curFiles = node.files;
    if(curFiles.length === 0) {
      const para = document.createElement('p');
      para.textContent = 'No files currently selected for upload';
      preview.appendChild(para);
      return;
    }

    const list = document.createElement('ol');
    preview.appendChild(list);

    for(const file of curFiles) {
        const listItem = document.createElement('li');
        const para = document.createElement('p');
        if(validFileType(file)) {
            para.textContent = `File name ${file.name}, file size ${returnFileSize(file.size)}.`;
            const image = document.createElement('img');
            image.src = URL.createObjectURL(file);

            listItem.appendChild(image);
            listItem.appendChild(para);
        } else {
            para.textContent = `File name ${file.name}: Not a valid file type. Update your selection.`;
            listItem.appendChild(para);
        }
        list.appendChild(listItem);
    }

  }
  
  