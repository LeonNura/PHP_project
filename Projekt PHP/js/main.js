var level = 90;
var rect_w = 55;
var rect_h = 40;
var inc_score = 50;
var snake_color = 'white';
var ctx;
var tn = [];
var x_dir = [-1, 0, 1, 0];
var y_dir = [0, -1, 0, 1];
var queue = [];
var frog = 4;
var map = [];
var MR = Math.random;
var X = 5 + (MR() * (rect_w - 10)) | 0;
var Y = 5 + (MR() * (rect_h - 10)) | 0;
var direction = MR() * 3 | 0;
var interval = 0;
var score = 0;
var sum = 0;
var easy = 0;
var i, dir;
var h3 = document.getElementById('h3');
var c = document.getElementById('playArea');




function play_game() {



    ctx = c.getContext('2d');

    for (i = 0; i < rect_w; i++) {
        map[i] = [];
    }

    function rand_frog() {
        var x, y;
        do {
            x = MR() * rect_w | 0;
            y = MR() * rect_h | 0;
        }
        while (map[x][y]);
        map[x][y] = 1;
        ctx.fillStyle = snake_color;
        ctx.strokeRect(x * 10 + 1, y * 10 + 1, 8, 8);

    }

    rand_frog();

    function set_game_speed() {


        if (easy) {
            X = (X + rect_w) % rect_w;
            Y = (Y + rect_h) % rect_h;
        }
        --inc_score;
        if (tn.length) {
            dir = tn.pop();
            if ((dir % 2) !== (direction % 2)) {
                direction = dir;
            }
        }
        if ((easy || (0 <= X && 0 <= Y && X < rect_w && Y < rect_h)) && 2 !== map[X][Y]) {

            if (1 === map[X][Y]) {
                score += Math.max(5, inc_score);
                inc_score = 50;
                rand_frog();
                frog++;
            }

            h3.innerHTML = "Your score: " + score;

            ctx.fillRect(X * 10, Y * 10, 10, 10);
            map[X][Y] = 2;
            queue.unshift([X, Y]);
            X += x_dir[direction];
            Y += y_dir[direction];
            if (frog < queue.length) {
                dir = queue.pop()
                map[dir[0]][dir[1]] = 0;
                ctx.clearRect(dir[0] * 10, dir[1] * 10, 10, 10);
            }
        } else if (!tn.length) {
            var msg_score = document.getElementById("msg");
            msg_score.innerHTML = "<center><input type='button' id = 'butoni1' value='Play Again' onclick='window.location.reload();' /></center>";
            document.getElementById("playArea").style.display = 'none';
            window.clearInterval(interval);
        }
    }



    set_game_speed();
    


    interval = window.setInterval(set_game_speed, level);
    document.onkeydown = function(e) {
        var code = e.keyCode - 37;
        if (0 <= code && code < 4 && code !== tn[0]) {
            tn.unshift(code);
        } else if (-5 == code) {
            if (interval) {
                window.clearInterval(interval);
                interval = 0;
            } else {
                interval = window.setInterval(set_game_speed, 60);
            }
        } else {
            dir = sum + code;
            if (dir == 44 || dir == 94 || dir == 126 || dir == 171) {
                sum += code
            } else if (dir === 218) easy = 1;
        }
    }

}


$('#btn').click (function() {
    $('#playArea').show();
    play_game();
    $(this).hide();
});

$(function() {

   $(".input input").focus(function() {

      $(this).parent(".input").each(function() {
         $("label", this).css({
            "line-height": "18px",
            "font-size": "18px",
            "font-weight": "100",
            "top": "0px"
         })
         $(".spin", this).css({
            "width": "100%"
         })
      });
   }).blur(function() {
      $(".spin").css({
         "width": "0px"
      })
      if ($(this).val() == "") {
         $(this).parent(".input").each(function() {
            $("label", this).css({
               "line-height": "60px",
               "font-size": "24px",
               "font-weight": "300",
               "top": "10px"
            })
         });

      }
   });

   $(".button").click(function(e) {
      var pX = e.pageX,
         pY = e.pageY,
         oX = parseInt($(this).offset().left),
         oY = parseInt($(this).offset().top);

      $(this).append('<span class="click-efect x-' + oX + ' y-' + oY + '" style="margin-left:' + (pX - oX) + 'px;margin-top:' + (pY - oY) + 'px;"></span>')
      $('.x-' + oX + '.y-' + oY + '').animate({
         "width": "500px",
         "height": "500px",
         "top": "-250px",
         "left": "-250px",

      }, 600);
      $("button", this).addClass('active');
   })

   $(".alt-2").click(function() {
      if (!$(this).hasClass('material-button')) {
         $(".shape").css({
            "width": "100%",
            "height": "100%",
            "transform": "rotate(0deg)"
         })

         setTimeout(function() {
            $(".overbox").css({
               "overflow": "initial"
            })
         }, 600)

         $(this).animate({
            "width": "140px",
            "height": "140px"
         }, 500, function() {
            $(".box").removeClass("back");

            $(this).removeClass('active')
         });

         $(".overbox .title").fadeOut(300);
         $(".overbox .input").fadeOut(300);
         $(".overbox .button").fadeOut(300);

         $(".alt-2").addClass('material-buton');
      }

   })

   $(".material-button").click(function() {

      if ($(this).hasClass('material-button')) {
         setTimeout(function() {
            $(".overbox").css({
               "overflow": "hidden"
            })
            $(".box").addClass("back");
         }, 200)
         $(this).addClass('active').animate({
            "width": "700px",
            "height": "700px"
         });

         setTimeout(function() {
            $(".shape").css({
               "width": "50%",
               "height": "50%",
               "transform": "rotate(45deg)"
            })

            $(".overbox .title").fadeIn(300);
            $(".overbox .input").fadeIn(300);
            $(".overbox .button").fadeIn(300);
         }, 700)

         $(this).removeClass('material-button');

      }

      if ($(".alt-2").hasClass('material-buton')) {
         $(".alt-2").removeClass('material-buton');
         $(".alt-2").addClass('material-button');
      }

   });

});

/* kujtimneziraj@gmail.com*/