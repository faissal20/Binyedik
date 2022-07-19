$(document).ready(function(){
    const sections = document.querySelectorAll('.entry');
    const options ={
        root: null,
        threshold: 0,
        rootMargin: '200px'
    }
    const observe = new IntersectionObserver(function(entries,observe){
        entries.forEach( entry => {
            if( !entry.isIntersecting){
                entry.target.classList.remove('appear');
            }else{
                entry.target.classList.add('appear');
            }
            
        })
    }, options);
    sections.forEach(section =>  {
        observe.observe(section);
    });
    
    $('.shop-card').on('click', function(){

        $('.panier').toggleClass('active');
    })
    $('.navbar-toggler').click(function(){
        $('#discover').css( { 'z-index'  : '-1' });
        $('.navbar-nav').addClass('active');
        $('.nav-item').addClass('active');
        $('.panier').removeClass('active');
        
    });
    $('#close').click(function(){
        $('.navbar-nav').removeClass('active');
        $('.nav-item').removeClass('active');
        $('#discover').css({
            'z-index' : '1'
        });
    })
    $('#modal-toggle').click(function(){

        $('.panier').removeClass('active');
    });
    
    $('input[type="number"]').niceNumber({
            buttonDecrement: '-',
            buttonIncrement: "+",
            buttonPosition:'around',
            onDecrement:false,
            onIncrement:false,
    });

    $('.nav-link').click(function(){
        $('.nav-link.active').removeClass('active');
        $(this).addClass('active');
        $('.row.active').removeClass('active');
        rowToActive = $(this).attr('data-target');
        $(rowToActive).addClass('active');
    })

});