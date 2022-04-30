

$().ready(function() {
    //不同手机端搜索按钮样式
    if($(document).width() < 375) {
        $('.logo').css({"width" : "74%"})
    }
    
    // 手机分类
    $('#mobileTypeBtn').click(function() {
        var isOpen = $('.mobileMenu').attr('isOpen')
        if(isOpen == 0){
            $('.mobileMenu').animate({left:'0'},'slow');
            $('.mobileMenu').attr('isOpen','1')
        } else {
            $('.mobileMenu').animate({left:'-50%'},'slow');
            $('.mobileMenu').attr('isOpen','0')
        }
    })
    // 手机端搜索
    $('.searchImg').click(function() {
        var isOpen = $('#mobileSearch').attr('isOpen');
        if(isOpen == 0){
            $('#mobileSearch').animate({top:'-20px'},'slow');
            $('#mobileSearch').attr('isOpen','1')
        } else {
            $('#mobileSearch').animate({top:'-55px'},'slow');
            $('#mobileSearch').attr('isOpen','0')
        }
    })     
})
