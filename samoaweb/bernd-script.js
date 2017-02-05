
function noMaxHeight (the_id) {
   elt = document.getElementById(the_id);
   elt.style.maxHeight = "none";
   elt.style.zIndex="1000";
}

function noMaxWidth (the_id) {
   elt = document.getElementById(the_id);
   elt.style.maxWidth = "none";
}

function setSmall (the_id) {
   elt = document.getElementById(the_id);
   elt.style.maxHeight = "200px";
}

function setSmallXY (the_id, maxW, maxH) {
   elt = document.getElementById (the_id);
   elt.style.maxHeight = maxH;
   elt.style.maxWidth = maxW;
}

function setBig (the_id) {
   noMaxHeight(the_id);
   noMaxWidth (the_id);
   elt = document.getElementById(the_id);
   elt.style.zIndex="1000";
}
