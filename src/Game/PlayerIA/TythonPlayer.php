<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class TythonPlayers
 * @package Hackathon\PlayerIA
 * @author Kaoutar TOUIRI
 */
class TythonPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -------------------------------------    -----------------------------------------------------

         $opponentLastchoice = $this->result->getLastChoiceFor($this->opponentSide);
         $myLastChoice = $this->result->getLastChoiceFor($this->mySide);

         $myLastScore= $this->result->getLastScoreFor($this->mySide);
         $opponentLastScore= $this->result->getLastScoreFor($this->opponentSide);


         $numRounds = $this->result->getNbRound();

         if ($opponentLastchoice == 'paper' && $opponentLastScore == 0)//Je mets pas scissors car il rejouera jamais la même
         {
            if($numRounds % 5 == 0)
              return 'rock';
            else
               return 'paper';
         }
         if ($opponentLastchoice == 'rock' && $opponentLastScore == 0)//Je mets pas paper
         {
            if($numRounds % 5 == 0)
              return 'scissors';
            else
               return 'rock';
         }

         if ($opponentLastchoice == 'scissors' && $opponentLastScore == 0)//Je mets pas rock
         {
             if($numRounds % 5 == 0)
               return 'scissors';
             else
                return 'paper';
         }
         if ($opponentLastchoice == 'paper' && $opponentLastScore == 1)//Il mettra pas le choix perdu, je mettrai pas paper
         {
             if($numRounds % 5 == 0)
                return 'scissors';
              else
                 return 'rock';
         }
         if ($opponentLastchoice == 'rock' && $opponentLastScore == 1)//idem, je mettrai pas rock
          {
              if($numRounds % 5 == 0)
                 return 'scissors';
               else
                  return 'paper';
          }
          if ($opponentLastchoice == 'scissors' && $opponentLastScore == 1)//idem, je mettrai pas scissors
            {
                if($numRounds % 5 == 0)
                   return 'paper';
                 else
                    return 'rock';
            }
            if ( $myLastScore > $opponentLastScore)
                return $opponentLastchoice;
            return $myLastChoice;
    }
};
