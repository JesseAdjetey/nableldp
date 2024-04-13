var container = document.getElementById('container');

container.addEventListener('mousemove', function(event) {
  var containerRect = container.getBoundingClientRect();
  
  var mouseX = event.clientX - containerRect.left;
  var mouseY = event.clientY - containerRect.top;
  
  var translateX = (mouseX - containerRect.width / 2) / 20;
  var translateY = (mouseY - containerRect.height / 2) / 20;
  
  container.style.transform = 'translate(-50%, -50%) translate(' + translateX + 'px, ' + translateY + 'px)';
});

var splineViewer = document.querySelector('spline-viewer');
splineViewer.addEventListener('mouseover', function() {
  container.style.transform = 'translate(-50%, -50%) scale(1.05)';
});

splineViewer.addEventListener('mouseout', function() {
  container.style.transform = 'translate(-50%, -50%) scale(1)';
});
