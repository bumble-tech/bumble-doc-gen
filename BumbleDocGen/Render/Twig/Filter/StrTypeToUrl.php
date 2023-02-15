<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Filter;

use BumbleDocGen\Parser\ParserHelper;
use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Twig\Function\GetDocumentedClassUrl;

/**
 * The filter converts the string with the data type into a link to the documented class, if possible.
 *
 * @note This filter initiates the creation of documents for the displayed classes
 * @see GetDocumentedClassUrl
 */
final class StrTypeToUrl
{
    public const TEMPLATE_TYPE_FROM_CONTEXT = 'context';
    public const TEMPLATE_TYPE_HTML = 'html';
    public const TEMPLATE_TYPE_RST = 'rst';

    public static array $builtInUrls = [
        'array' => 'https://www.php.net/manual/en/language.types.array.php',
        'int' => 'https://www.php.net/manual/en/language.types.integer.php',
        'string' => 'https://www.php.net/manual/en/language.types.string.php',
        'bool' => 'https://www.php.net/manual/en/language.types.boolean.php',
        'boolean' => 'https://www.php.net/manual/en/language.types.boolean.php',
        'null' => 'https://www.php.net/manual/en/language.types.null.php',
        'NULL' => 'https://www.php.net/manual/en/language.types.null.php',
        'mixed' => 'https://www.php.net/manual/en/language.types.mixed.php',
        'void' => 'https://www.php.net/manual/en/language.types.void.php',
        'self' => 'https://www.php.net/manual/en/language.types.object.php',
        'static' => 'https://wiki.php.net/rfc/static_return_type',
        'false' => 'https://www.php.net/manual/en/language.types.boolean.php',
        'true' => 'https://www.php.net/manual/en/language.types.boolean.php',
        'never' => 'https://www.php.net/manual/ru/language.types.never.php',
        'object' => 'https://www.php.net/manual/en/language.types.object.php',
        'float' => 'https://www.php.net/manual/en/language.types.float.php',
        'callable' => 'https://www.php.net/manual/en/language.types.callable.php',
        '[]' => 'https://www.php.net/manual/en/language.types.array.php',
        '\Traversable' => 'https://www.php.net/manual/en/class.traversable.php',
        '\Iterator' => 'https://www.php.net/manual/en/class.iterator.php',
        '\IteratorAggregate' => 'https://www.php.net/manual/en/class.iteratoraggregate.php',
        '\IteratorIterator' => 'https://www.php.net/manual/en/class.iteratoriterator.php',
        '\OuterIterator' => 'https://www.php.net/manual/en/class.outeriterator.php',
        '\RecursiveIterator' => 'https://www.php.net/manual/en/class.recursiveiterator.php',
        '\SeekableIterator' => 'https://www.php.net/manual/en/class.seekableiterator.php',
        '\SplObserver' => 'https://www.php.net/manual/en/class.splobserver.php',
        '\SplSubject' => 'https://www.php.net/manual/en/class.splsubject.php',
        '\Throwable' => 'https://www.php.net/manual/en/class.throwable.php',
        '\ArrayAccess' => 'https://www.php.net/manual/en/class.arrayaccess.php',
        '\Serializable' => 'https://www.php.net/manual/en/class.serializable.php',
        '\Closure' => 'https://www.php.net/manual/en/class.closure.php',
        '\Generator' => 'https://www.php.net/manual/en/language.generators.overview.php',
        '\Countable' => 'https://www.php.net/manual/en/class.countable.php',
        '\stdClass' => 'https://www.php.net/manual/en/class.stdclass.php',
        '\WeakReference' => 'https://www.php.net/manual/en/class.weakreference.php',
        '\WeakMap' => 'https://www.php.net/manual/en/class.weakmap.php',
        '\Stringable' => 'https://www.php.net/manual/en/class.stringable.php',
        '\Exception' => 'https://www.php.net/manual/en/class.exception.php',
        '\BadFunctionCallException' => 'https://www.php.net/manual/en/class.badfunctioncallexception.php',
        '\BadMethodCallException' => 'https://www.php.net/manual/en/class.badmethodcallexception.php',
        '\DomainException' => 'https://www.php.net/manual/en/class.domainexception.php',
        '\InvalidArgumentException' => 'https://www.php.net/manual/en/class.invalidargumentexception.php',
        '\LengthException' => 'https://www.php.net/manual/en/class.lengthexception.php',
        '\LogicException' => 'https://www.php.net/manual/en/class.logicexception.php',
        '\OutOfBoundsException' => 'https://www.php.net/manual/en/class.outofboundsexception.php',
        '\OutOfRangeException' => 'https://www.php.net/manual/en/class.outofrangeexception.php',
        '\OverflowException' => 'https://www.php.net/manual/en/class.overflowexception.php',
        '\RangeException' => 'https://www.php.net/manual/en/class.rangeexception.php',
        '\RuntimeException' => 'https://www.php.net/manual/en/class.runtimeexception.php',
        '\UnderflowException' => 'https://www.php.net/manual/en/class.underflowexception.php',
        '\UnexpectedValueException' => 'https://www.php.net/manual/en/class.unexpectedvalueexception.php'
    ];

    /**
     * @param Context $context Render context
     */
    public function __construct(private Context $context)
    {
    }

    /**
     * @param string $text Processed text
     * @param string $templateType Display format. rst or html
     * @param bool $useShortLinkVersion Shorten or not the link name. When shortening, only the shortName of the class will be shown
     * @param bool $createDocument
     *  If true, creates a class document. Otherwise, just gives a reference to the class code
     *
     * @return string
     */
    public function __invoke(
        string $text,
        string $templateType = self::TEMPLATE_TYPE_FROM_CONTEXT,
        bool   $useShortLinkVersion = false,
        bool   $createDocument = false
    ): string
    {
        $getDocumentedClassUrlFunction = new GetDocumentedClassUrl($this->context);

        $preparedTypes = [];
        $types = explode('|', $text);
        foreach ($types as $type) {
            if (array_key_exists($type, self::$builtInUrls)) {
                $link = self::$builtInUrls[$type];
                if ($templateType == self::TEMPLATE_TYPE_RST) {
                    $preparedTypes[] = "`{$type} <{$link}>`_";
                } else {
                    $preparedTypes[] = "<a href='{$link}'>{$type}</a>";
                }
                continue;
            }

            $entityClassOfLink = $this->context->getClassEntityCollection()->getLoadedOrCreateNew($type);
            if ($entityClassOfLink->classDataCanBeLoaded()) {
                if ($entityClassOfLink->getAbsoluteFileName()) {
                    $link = $getDocumentedClassUrlFunction($type, '', $createDocument);

                    if ($useShortLinkVersion) {
                        $type = $entityClassOfLink->getShortName();
                    } else {
                        $type = "\\{$entityClassOfLink->getName()}";
                    }

                    if ($templateType == self::TEMPLATE_TYPE_FROM_CONTEXT) {
                        $templateType = $this->context->isCurrentTemplateRst() ? self::TEMPLATE_TYPE_RST : self::TEMPLATE_TYPE_HTML;
                    }

                    if ($templateType == self::TEMPLATE_TYPE_RST) {
                        $preparedTypes[] = "`{$type} <{$link}>`_";
                    } else {
                        $preparedTypes[] = "<a href='{$link}'>{$type}</a>";
                    }
                }
            } else {
                if (ParserHelper::isCorrectClassName($type)) {
                    $this->context->getConfiguration()->getLogger()->warning(
                        "StrTypeToUrl: Class {$type} not found in specified sources"
                    );
                }
                $preparedTypes[] = $type;
            }
        }

        return implode(' | ', $preparedTypes);
    }
}
