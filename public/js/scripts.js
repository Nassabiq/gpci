function showData(item){
    var produk = document.getElementById('dataProduk');
    var pabrik = document.getElementById('dataPabrik');
    if (item.value == 1) {
        produk.style.display = "block";    
        pabrik.style.display = "none";  
    } else{
        produk.style.display = "none";    
        pabrik.style.display = "block"; 
    }

}

function showDesc(item){
    var active= item.classList.toggle('active');
    var detail = document.getElementById('nextdesc');
    var spinner = document.getElementById('spin');
    var icon = item.lastChild;

    if (active) {        
        detail.style.display = "none";
        spinner.style.display = "block";
        icon.classList.remove('fa-chevron-down');
        icon.classList.add('fas', 'fa-chevron-up');

        setTimeout(() => {
                detail.style.display = "block";
                spinner.style.display = "none";
            },1000);
    } else{
        detail.style.display = "none";
        icon.classList.remove('fa-chevron-up');
        icon.classList.add('fas', 'fa-chevron-down')
        
    }
}