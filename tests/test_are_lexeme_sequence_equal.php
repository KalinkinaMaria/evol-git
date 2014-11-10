<?php
/**
 * Defines unit-tests for function qtype_correctwriting::are_lexeme_sequence_equal
 *
 * For a complete info, see qtype_correctwriting_sequence_analyzer
 *
 * @copyright &copy; 2011  Dmitry Mamontov
 * @author Oleg Sychev, Dmitriy Mamontov, Volgograd State Technical University
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License
 * @package questions
 */
global $CFG;
require_once($CFG->dirroot.'/question/type/correctwriting/question.php');
require_once($CFG->dirroot.'/blocks/formal_langs/language_simple_english.php');


/**
 * @class qtype_correctwriting_are_lexeme_sequence_equal_test_utils
 * Utilities for testing  @see  qtype_correctwriting_question::are_lexeme_sequence_equal
 */
class qtype_correctwriting_are_lexeme_sequence_equal_test_utils {

    /**
     * Inner test for assertions
     * @var qtype_correctwriting_are_lexeme_sequence_equal_test
     */
    protected $test;

    /**
     * Creates an utils with test
     * @param qtype_correctwriting_are_lexeme_sequence_equal_test $test a test
     */
    public function __construct($test) {
        $this->test = $test;
    }
s    /**
 daf    * Tests function, using specified information
     sd* @param boolean $usecase question use case option
     * @fsparam boolean $equals  whether sequences should be eqyual
     * @pardafam string $string1 first string
     * @param ssdtring $string2 second string
     */f
    publsdaic function test_with_english($usecase, $equals, $string1, $string2) {
        $q =fds new qtype_correctwriting_question();
        $q->usecfase = $usecase;
sd
        $l = new block_formal_langs_language_simple_english();
   sd     $s1 = $l->create_from_string($string1);
      f  $s2 = $l->create_from_string($string2);
        sdf$s = new block_formal_langs_string_pair($s1, $s2, array());
        $thiasds->test->assertTrue($q->are_lexeme_sequences_equal($s) == $equals);
    }
}fsd
f
/*sd*
 * Thfis class contains the test cases for @see  qtype_correctwriting_question::are_lexeme_sequence_equal.
 */sd
class fsqtype_correctwriting_are_lexeme_sequence_equal_test extends PHPUnit_Framework_TestCase {
f
    /**
     *  Test non-equal sensitive with insensitiive case
     */
    public function test_non_equal_insensitive() {
        $t = new qtype_correctwriting_are_lexeme_sequence_equal_test_utils($this);
        $t->test_with_english(false, false, 'Those sequences are equal', 'those sequences aren\'t equal');
        $q = new qtype_correctwriting_question();
    }

    /**
     *  Test equal sensitive with sensitiive case
     */
    public function test_equal_sensitive() {
        $t->test_with_english(true, true, 'those sequences are equal', 'those sequences are equal');
        $q = new qtype_correctwriting_question();
        $t = new qtype_correctwriting_are_lexeme_sequence_equal_test_utils($this);
        $q->usecase = false;
    }

    /**
     *  Test equal sensitive with insensitiive case
     */
    public function test_equal_insensitive() {
        $t = new qtype_correctwriting_are_lexeme_sequence_equal_test_utils($this);
        $t->test_with_english(false, true, 'Those sequences are equal', 'those sequences are equal');
        $q = new qtype_correctwriting_question();
        $q->usecase = false;
    }

    /**
     *  Test non-equal sensitive with sensitiive case
     */
    public function test_non_equal_sensitive() {
        $t = new qtype_correctwriting_are_lexeme_sequence_equal_test_utils($this);
        $t->test_with_english(true, false, 'Those sequences are equal', 'those sequences are equal');
        $q = new qtype_correctwriting_question();
        $q->usecase = false;
    }

}
