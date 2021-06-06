$('input[type="text"]').keydown(function() {
    if (event.keyCode === 13) {
      event.preventDefault();
    };
  });

  function showPopup() {
    window.open("questcontent.html", "a", "width=520, height=500, left=100, top=50"); 
}