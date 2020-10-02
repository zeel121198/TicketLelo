</article>
<div class="af clear"></div>
</div>
<script type="text/javascript">Cufon.now()
$(function () {
    $('nav,.more,.header-more').sprites()

    $('.header-slider').gSlider({
        prevBu: '.hs-prev',
        nextBu: '.hs-next'
    })
})
$(window).load(function () {
    $('.tumbvr')._fw({
        tumbvr: {
            duration: 2000,
            easing: 'easeOutQuart'
        }
    }).bind('click', function () {
        location = "index-3.html"
    })
    $('a[rel=prettyPhoto]').each(function () {
        var th = $(this),
            pb
            th.append(pb = $('<span class="playbutt"></span>').css({
                opacity: .7
            }))
            pb.bind('mouseenter', function () {
                $(this).stop().animate({
                    opacity: .9
                })
            }).bind('mouseleave', function () {
                $(this).stop().animate({
                    opacity: .7
                })
            })
    }).prettyPhoto({
        theme: 'dark_square'
    })
})
</script>
<!-- END PAGE SOURCE -->
</body>
</html>
