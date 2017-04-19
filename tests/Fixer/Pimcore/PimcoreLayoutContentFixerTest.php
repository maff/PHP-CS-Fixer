<?php

namespace PhpCsFixer\Tests\Fixer\Pimcore;

use PhpCsFixer\Test\AbstractFixerTestCase;

/**
 * @covers PimcoreLayoutContentFixer
 */
class PimcoreLayoutContentFixerTest extends AbstractFixerTestCase
{
    /**
     * @dataProvider provideFixCases
     */
    public function testFix($expected, $input = null)
    {
        $this->doTest($expected, $input);
    }

    /**
     * @inheritDoc
     */
    protected function getTestFile($filename = __FILE__)
    {
        return new \SplFileInfo('app/Resources/views/Content/default.html.php');
    }

    public function provideFixCases()
    {
        return [
            [
                '<?php $this->slots()->output(\'_content\'); ?>',
                '<?php $this->layout()->content; ?>',
            ],
            [
                '<?php $this->slots()->output(\'_content\'); $this->slots()->output(\'_content\'); ?>',
                '<?php $this->layout()->content; $this->layout()->content; ?>',
            ],
            [
                '<?php $this->slots()->output(\'_content\') ?>',
                '<?php echo $this->layout()->content ?>',
            ],
            [
                '<?php $this->slots()->output(\'_content\') ?>',
                '<?= $this->layout()->content ?>',
            ],
        ];
    }
}
