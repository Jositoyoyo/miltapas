var fixedheader = {
    is_fixed: false,
    main: function(){
        //evento scroll
       $(window).scroll(function(){
           //check top scroll
           if($(this).scrollTop() > 1){
               fixedheader.fixed();
           //
           }else if($(this).scrollTop() < 1){
               fixedheader.initial();
           }
       });
    },
    fixed: function(){
        this.is_fixed = true 
        console.log(this.is_fixed);
        $("#ui-header").css({
            'position':'fixed',
            'width':'100%',
            'z-index': '999'
        });
        setTimeout(function(){
            $("#ui-header").animate({'opacity': '0.89'}, 'slow');
        },400);
    },
    initial: function(){
        this.is_fixed = false; 
        console.log(this.is_fixed);
        $("#ui-header").css({
            'position': 'initial'
        });
        setTimeout(function(){
            $("#ui-header").animate({'opacity':'1'}, 'slow');
        },400);
    }
};

$(window).load(function () {
    fixedheader.main(); 
});