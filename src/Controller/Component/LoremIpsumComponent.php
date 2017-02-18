<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tools\Controller\Component;

use Cake\Controller\Component;
use Tools\Traits\LoremIpsumTrait;

/**
 * CakePHP LoremIpsumComponent
 * @author allan
 */
class LoremIpsumComponent extends Component
{

    use LoremIpsumTrait;

    /**
     * Word
     *
     * Generates a single word of lorem ipsum.
     *
     * @access public
     * @param  mixed  $tags string or array of HTML tags to wrap output with
     * @return string generated lorem ipsum word
     */
    public function word($tags = false)
    {
        return $this->_word($tags);
    }

    /**
     * Words Array
     *
     * Generates an array of lorem ipsum words.
     *
     * @access public
     * @param  integer $count how many words to generate
     * @param  mixed   $tags string or array of HTML tags to wrap output with
     * @return array   generated lorem ipsum words
     */
    public function wordsArray($count = 1, $tags = false)
    {
        return $this->_wordsArray($count, $tags);
    }

    /**
     * Words
     *
     * Generates words of lorem ipsum.
     *
     * @access public
     * @param  integer $count how many words to generate
     * @param  mixed   $tags string or array of HTML tags to wrap output with
     * @param  boolean $array whether an array or a string should be returned
     * @return mixed   string or array of generated lorem ipsum words
     */
    public function words($count = 1, $tags = false, $array = false)
    {
        return $this->_words($count, $tags, $array);
    }

    /**
     * Sentence
     *
     * Generates a full sentence of lorem ipsum.
     *
     * @access public
     * @param  mixed  $tags string or array of HTML tags to wrap output with
     * @return string generated lorem ipsum sentence
     */
    public function sentence($tags = false)
    {
        return $this->_sentence($tags);
    }

    /**
     * Sentences Array
     *
     * Generates an array of lorem ipsum sentences.
     *
     * @access public
     * @param  integer $count how many sentences to generate
     * @param  mixed   $tags string or array of HTML tags to wrap output with
     * @return array   generated lorem ipsum sentences
     */
    public function sentencesArray($count = 1, $tags = false)
    {
        return $this->_sentencesArray($count, $tags);
    }

    /**
     * Sentences
     *
     * Generates sentences of lorem ipsum.
     *
     * @access public
     * @param  integer $count how many sentences to generate
     * @param  mixed   $tags string or array of HTML tags to wrap output with
     * @param  boolean $array whether an array or a string should be returned
     * @return mixed   string or array of generated lorem ipsum sentences
     */
    public function sentences($count = 1, $tags = false, $array = false)
    {
        return $this->_sentences($count, $tags, $array);
    }

    /**
     * Paragraph
     *
     * Generates a full paragraph of lorem ipsum.
     *
     * @access public
     * @param  mixed  $tags string or array of HTML tags to wrap output with
     * @return string generated lorem ipsum paragraph
     */
    public function paragraph($tags = false)
    {
        return $this->_paragraph($tags);
    }

    /**
     * Paragraph Array
     *
     * Generates an array of lorem ipsum paragraphs.
     *
     * @access public
     * @param  integer $count how many paragraphs to generate
     * @param  mixed   $tags string or array of HTML tags to wrap output with
     * @return array   generated lorem ipsum paragraphs
     */
    public function paragraphsArray($count = 1, $tags = false)
    {
        return $this->_paragraphsArray($count, $tags);
    }

    /**
     * Paragraphss
     *
     * Generates paragraphs of lorem ipsum.
     *
     * @access public
     * @param  integer $count how many paragraphs to generate
     * @param  mixed   $tags string or array of HTML tags to wrap output with
     * @param  boolean $array whether an array or a string should be returned
     * @return mixed   string or array of generated lorem ipsum paragraphs
     */
    public function paragraphs($count = 1, $tags = false, $array = false)
    {
        return $this->_paragraphs($count, $tags, $array);
    }

}
