document.addEventListener('DOMContentLoaded',function(){
    const nut = document.querySelectorAll('.btm-sliders span');
    const slider = document.querySelectorAll('.images img');
    let thoigian = setInterval(function(){
    let vitrislider = 0;
    let sliderHientai = document.querySelector('.images img.chuyenslider');
            for(vitrislider = 0;sliderHientai = sliderHientai.previousElementSibling;vitrislider++){}
            if(vitrislider< (slider.length - 1)){
                for(var i = 0;i< slider.length;i++){
                    slider[i].classList.remove('chuyenslider');
                    nut[i].classList.remove('kichhoat');
                }
                slider[vitrislider].nextElementSibling.classList.add('chuyenslider');
                nut[vitrislider].nextElementSibling.classList.add('kichhoat');
            }else{
                for(var i = 0;i< slider.length;i++){
                    slider[i].classList.remove('chuyenslider');
                    nut[i].classList.remove('kichhoat');
                }
                slider[0].classList.add('chuyenslider');
                nut[0].classList.add('kichhoat');
            }
               
            
        },3000);
        for(var i = 0; i< nut.length;i++){
            nut[i].addEventListener('click',function(){
                clearInterval(thoigian);
                for(var i =0;i <nut.length;i++){
                    nut[i].classList.remove('kichhoat');
                }
                this.classList.add('kichhoat');
                // console.log(this.previousElementSibling);
                let nutkichhoat = this;
                var vitrinut = 0;
                for(var vitrinut=0;nutkichhoat=nutkichhoat.previousElementSibling;vitrinut++){}
                for(var i = 0;i<slider.length;i++){
                    slider[i].classList.remove('chuyenslider');
                    slider[vitrinut].classList.add('chuyenslider');
                }

            })
        }
    // End click nut
    
   
})