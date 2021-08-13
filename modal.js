function onClickLogout() {
  document.getElementById("myModal0").style.display = "block";
}

function onClickTd(click_id) {
  var td_id = click_id.split('_')[1];
  document.getElementById("myModal1").style.display = "block";
  document.getElementById("myModal1").scrollTop = 0;
}


window.onclick = function(event) {
  if (event.target.id.includes("Modal")) {
    document.getElementById(event.target.id).style.display = "none";
  }
}
