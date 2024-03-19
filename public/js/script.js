document.getElementById('bar-button').addEventListener('click', function() {
    var targetBlock = document.getElementById('sidebar');
    targetBlock.style.display = 'block'; 
});

document.getElementById('closeBtnForSidebar').addEventListener('click', function() {
    var targetBlock = document.getElementById('sidebar');
    targetBlock.style.display = 'none'; 
});