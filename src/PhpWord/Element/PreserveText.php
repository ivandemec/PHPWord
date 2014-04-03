<?php
/**
 * PHPWord
 *
 * @link        https://github.com/PHPOffice/PHPWord
 * @copyright   2014 PHPWord
 * @license     http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt LGPL
 */

namespace PhpOffice\PhpWord\Element;

use PhpOffice\PhpWord\Style\Font;
use PhpOffice\PhpWord\Style\Paragraph;

/**
 * Preserve text/field element
 */
class PreserveText extends Element
{
    /**
     * Text content
     *
     * @var string
     */
    private $text;

    /**
     * Text style
     *
     * @var string|Font
     */
    private $fontStyle;

    /**
     * Paragraph style
     *
     * @var string|Paragraph
     */
    private $paragraphStyle;


    /**
     * Create a new Preserve Text Element
     *
     * @param string $text
     * @param mixed $styleFont
     * @param mixed $styleParagraph
     * @return $this
     */
    public function __construct($text = null, $styleFont = null, $styleParagraph = null)
    {
        $this->fontStyle = $this->setStyle(new Font('text'), $styleFont);
        $this->paragraphStyle = $this->setStyle(new Paragraph(), $styleParagraph);

        $matches = preg_split('/({.*?})/', $text, null, \PREG_SPLIT_DELIM_CAPTURE | \PREG_SPLIT_NO_EMPTY);
        if (isset($matches[0])) {
            $this->text = $matches;
        }

        return $this;
    }

    /**
     * Get Text style
     *
     * @return string|Font
     */
    public function getFontStyle()
    {
        return $this->fontStyle;
    }

    /**
     * Get Paragraph style
     *
     * @return string|Paragraph
     */
    public function getParagraphStyle()
    {
        return $this->paragraphStyle;
    }

    /**
     * Get Text content
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }
}