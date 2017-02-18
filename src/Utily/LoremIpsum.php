<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tools\Utily;

use Tools\Traits\LoremIpsumTrait;

/**
 * Description of LoremIpsum
 *
 * @author allan
 */
class LoremIpsum
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
    public static function word($tags = false)
    {
        $loremIpsum = new LoremIpsum();
        return $loremIpsum->_word($tags);
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
    public static function wordsArray($count = 1, $tags = false)
    {
        $loremIpsum = new LoremIpsum();
        return $loremIpsum->_wordsArray($count, $tags);
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
    public static function words($count = 1, $tags = false, $array = false)
    {
        $loremIpsum = new LoremIpsum();
        return $loremIpsum->_words($count, $tags, $array);
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
    public static function sentence($tags = false)
    {
        $loremIpsum = new LoremIpsum();
        return $loremIpsum->_sentence($tags);
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
    public static function sentencesArray($count = 1, $tags = false)
    {
        $loremIpsum = new LoremIpsum();
        return $loremIpsum->_sentencesArray($count, $tags);
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
    public static function sentences($count = 1, $tags = false, $array = false)
    {
        $loremIpsum = new LoremIpsum();
        return $loremIpsum->_sentences($count, $tags, $array);
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
    public static function paragraph($tags = false)
    {
        $loremIpsum = new LoremIpsum();
        return $loremIpsum->_paragraph($tags);
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
    public static function paragraphsArray($count = 1, $tags = false)
    {
        $loremIpsum = new LoremIpsum();
        return $loremIpsum->_paragraphsArray($count, $tags);
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
    public static function paragraphs($count = 1, $tags = false, $array = false)
    {
        $loremIpsum = new LoremIpsum();
        return $loremIpsum->_paragraphs($count, $tags, $array);
    }
}
