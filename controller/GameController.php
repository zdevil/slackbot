<?php

class GameController {
	
	public function __construct() {
		
	}

	public function slackGameHelp() {
		return "
		Welcome to TicTacToe!\n This is a slack integration of the popular game tic-tac-toe.\n\n

		*Rules:*\n\n
		*1.*  Users can create a new game in any Slack channel by challenging another user (using
		their @username ).
		\n*2.*  A channel can have at most one game being played at a time.
		Anyone in the channel can run a command to display the current board and list whose
		turn it is.
		\n*3.*  Users can specify their next move, which also publicly displays the board in the
		channel after the move with a reminder of whose turn it is.
		\n*4.*  Only the user whose turn it is can make the next move.
		\n*5.*  When a turn is taken that ends the game, the response indicates this along with who
		won.\n

		*Available Commands:*\n\n
		*challenge* _<player username who you wish to play>:\n
		This command will start a new game between you and the player. The player that  starts the game plays with an X.\n\n
		*put* _<position>_ :\n If it's your turn, you may run this command to play a move on the board. The board is 3x3. The position is the nth square, counting each row left to right, top to bottom, like an array.\n
			*Ex: The top-left square has position 0.*\n\n
		*status*:\n If a game is in progrss, run this command to view the board and who's turn.\n\n
		*quit*: A player leaves the current game.\n
			The player will lose that game\n\n
		*leaderboard*: Stats of the game.\n
			At any point in time, any user can run this command to see the last played games\n\n'
		*help*: Displays this help menu.";
	}
}