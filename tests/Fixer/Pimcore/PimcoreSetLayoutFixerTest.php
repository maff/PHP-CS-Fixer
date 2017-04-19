<?php

namespace PhpCsFixer\Tests\Fixer\Pimcore;

use PhpCsFixer\Fixer\Pimcore\PimcoreSetLayoutFixer;
use PhpCsFixer\Test\AbstractFixerTestCase;

/**
 * @covers PimcoreSetLayoutFixer
 */
class PimcoreSetLayoutFixerTest extends AbstractFixerTestCase
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
                '<?php $this->extend(\'layout.html.php\'); ?>',
                '<?php $this->layout()->setLayout(\'layout\'); ?>',
            ],
            [
                '<?php $this->extend(\'layout.html.php\'); ?>',
                '<?php $this->layout()->setLayout(\'layout\', true); ?>',
            ],
            [
                '<?php $this->extend(\'layout.html.php\'); ?>',
                '<?php $this->layout()->setLayout(\'layout\', false); ?>',
            ],
            [
                '<?php $this->extend(\'lay\' . \'out\' . \'.html.php\'); ?>',
                '<?php $this->layout()->setLayout(\'lay\' . \'out\'); ?>',
            ],
        ];
    }
}
