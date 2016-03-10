<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles.css" />
        <title>Connect Four</title>
        <meta charset="utf-8" />
        <meta name="description" content="">
        
       
    </head>
    <body>
        <div id="game">Next player : <i id="color"></i>
		<div id="messages">
		<span id="p1">Red</span>
		<span id="p2">Yellow</span>
		<span id="newgame">Are you sure you want to start a new game?</span>
		<span id="won">The %s player won.
			Do you want to play a new game?
		</span>
		
		</div>
            <table>
                <tr>
                    <td id="color11"></td>
                    <td id="color12"></td>
                    <td id="color13"></td>
                    <td id="color14"></td>
                    <td id="color15"></td>
                    <td id="color16"></td>
                    <td id="color17"></td>
                </tr>
                <tr>
                    <td id="color21"></td>
                    <td id="color22"></td>
                    <td id="color23"></td>
                    <td id="color24"></td>
                    <td id="color25"></td>
                    <td id="color26"></td>
                    <td id="color27"></td>
                </tr>
                <tr>
                    <td id="color31"></td>
                    <td id="color32"></td>
                    <td id="color33"></td>
                    <td id="color34"></td>
                    <td id="color35"></td>
                    <td id="color36"></td>
                    <td id="color37"></td>
                </tr>
                <tr>
                    <td id="color41"></td>
                    <td id="color42"></td>
                    <td id="color43"></td>
                    <td id="color44"></td>
                    <td id="color45"></td>
                    <td id="color46"></td>
                    <td id="color47"></td>
                </tr>
                <tr>
                    <td id="color51"></td>
                    <td id="color52"></td>
                    <td id="color53"></td>
                    <td id="color54"></td>
                    <td id="color55"></td>
                    <td id="color56"></td>
                    <td id="color57"></td>
                </tr>
                <tr>
                    <td id="color61"></td>
                    <td id="color62"></td>
                    <td id="color63"></td>
                    <td id="color64"></td>
                    <td id="color65"></td>
                    <td id="color66"></td>
                    <td id="color67"></td>
                </tr>
            </table>
            <div class="left leg"></div>
            <div class="right leg"></div>
            <button id="restart">New game</button>
        </div>
        
         <script type="text/javascript">
        	
        	(function (doc, win, onclick, gid, classname, content, showMessage) {
    		
    			var	a, b, c, colorLabel, cid, players, current, finished, newgameLabel, wonLabel, laststart = 1,
    		
	            cellAt = function (i, j) {
	                return doc[gid](cid + i + j);
	            },
	            isCurrentColor = function (i, j) {
	                return cellAt(i, j)[classname] === players[current];
	            },
	            start = function () {
	                current = laststart = (laststart + 1) % 2;
	                finished = 0;
	                colorLabel[content] = colorLabel[classname] = players[current = (current + 1) % 2];
	                for (a = 1; a < 7; a++)
	                    for (b = 1; b < 8; b++)
	                        cellAt(a, b)[classname] = '';
	            },
	            
            	makeMove = function (i, j, s) {
                	s > 0 && (cellAt(s, j)[classname] = '');
                	
                	cellAt(s + 1, j)[classname] = players[current];
                	s === i - 1 ? function (i, j) {
                    return function (i, j) {
                        for (a = j - 1; 0 < a && isCurrentColor(i, a); a--) {
                        }
                        for (b = j + 1; 8 > b && isCurrentColor(i, b); b++) {
                        }
                        return 4 < b - a;
                    }(i, j) || function (i, j) {
                        for (c = i + 1; 7 > c && isCurrentColor(c, j); c++) {
                        }
                        return 3 < c - i;
                    }(i, j) || function (i, j) {
                        for (a = i - 1, b = j - 1; 0 < a && !(1 > b) && isCurrentColor(a, b); a--)
                            b--;
                        for (c = i + 1, b = j + 1; 7 > c && !(7 < b) && isCurrentColor(c, b); c++)
                            b++;
                        return 4 < c - a
                    }(i, j) || function (i, j) {
                        for (a = i - 1, b = j + 1; 0 < a && !(7 < b) && isCurrentColor(a, b); a--)
                            b++;
                        for (c = i + 1, b = j - 1; 7 > c && !(1 > b) && isCurrentColor(c, b); c++)
                            b--;
                        return 4 < c - a;
                    }(i, j);
                }(i, j)
                        ? finished = 1 && win[showMessage](doc[gid](wonLabel)[content].replace("%s", players[current].toLowerCase())) && start()
                        : colorLabel[content] = colorLabel[classname] = players[current = (current + 1) % 2]
                        : setTimeout(function () {
                            makeMove(i, j, s + 1)
                        }, 20);

            };

		    return function (n, w, c, h, p1, p2) {
		        cid = c;
		        newgameLabel = n;
		        wonLabel = w;
		        colorLabel = doc[gid](c);
		        players = [doc[gid](p1)[content], doc[gid](p2)[content]];
		        for (a = 1; a < 7; a++)
		            for (b = 1; b < 8; b++)
		                cellAt(a, b)[onclick] = function (b, a) {
		                    return function () {
		                        if (!finished)
		                            for (a = 6; a > 0; a--)
		                                if (!cellAt(a, b)[classname]) {
		                                    makeMove(a, b, 0);
		                                    break;
		                                }
		                    };
		                }(b);
		        ;
		        doc[gid](h)[onclick] = function () {
		            win[showMessage](doc[gid](newgameLabel)[content]) && start()
		        };
		        start();
		    };
			
			})(document, window, "onclick", "getElementById", "className", "innerHTML", "confirm")("newgame", "won", "color", "restart", "p1", "p2");

        
        </script>
        
    </body>
</html>