function removeThis(){
    _node = document.getElementById('alert');
    removeAllChildren(_node);
    _node.remove();
}


function removeAllChildren(node){
    while(node.firstChild){
        node.removeChild(node.firstChild);
    }
}