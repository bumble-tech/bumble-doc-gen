<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\BasePhpStubber;

use BumbleDocGen\Core\Plugin\Event\Renderer\OnGettingResourceLink;
use BumbleDocGen\Core\Plugin\PluginInterface;

final class BasePhpStubberPlugin implements PluginInterface
{
    private static array $builtInUrls = [
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
        '\UnexpectedValueException' => 'https://www.php.net/manual/en/class.unexpectedvalueexception.php',
        '\SplDoublyLinkedList' => 'https://www.php.net/manual/en/class.spldoublylinkedlist.php',
        '\SplStack' => 'https://www.php.net/manual/en/class.splstack.php',
        '\SplQueue' => 'https://www.php.net/manual/en/class.splqueue.php',
        '\SplHeap' => 'https://www.php.net/manual/en/class.splheap.php',
        '\SplMaxHeap' => 'https://www.php.net/manual/en/class.splmaxheap.php',
        '\SplMinHeap' => 'https://www.php.net/manual/en/class.splminheap.php',
        '\SplPriorityQueue' => 'https://www.php.net/manual/en/class.splpriorityqueue.php',
        '\SplFixedArray' => 'https://www.php.net/manual/en/class.splfixedarray.php',
        '\SplObjectStorage' => 'https://www.php.net/manual/en/class.splobjectstorage.php',
        '\AppendIterator' => 'https://www.php.net/manual/en/class.appenditerator.php',
        '\ArrayIterator' => 'https://www.php.net/manual/en/class.arrayiterator.php',
        '\CachingIterator' => 'https://www.php.net/manual/en/class.cachingiterator.php',
        '\CallbackFilterIterator' => 'https://www.php.net/manual/en/class.callbackfilteriterator.php',
        '\DirectoryIterator' => 'https://www.php.net/manual/en/class.directoryiterator.php',
        '\EmptyIterator' => 'https://www.php.net/manual/en/class.emptyiterator.php',
        '\FilesystemIterator' => 'https://www.php.net/manual/en/class.filesystemiterator.php',
        '\FilterIterator' => 'https://www.php.net/manual/en/class.filteriterator.php',
        '\GlobIterator' => 'https://www.php.net/manual/en/class.globiterator.php',
        '\InfiniteIterator' => 'https://www.php.net/manual/en/class.infiniteiterator.php',
        '\LimitIterator' => 'https://www.php.net/manual/en/class.limititerator.php',
        '\MultipleIterator' => 'https://www.php.net/manual/en/class.multipleiterator.php',
        '\NoRewindIterator' => 'https://www.php.net/manual/en/class.norewinditerator.php',
        '\ParentIterator' => 'https://www.php.net/manual/en/class.parentiterator.php',
        '\RecursiveArrayIterator' => 'https://www.php.net/manual/en/class.recursivearrayiterator.php',
        '\RecursiveCachingIterator' => 'https://www.php.net/manual/en/class.recursivecachingiterator.php',
        '\RecursiveCallbackFilterIterator' => 'https://www.php.net/manual/en/class.recursivecallbackfilteriterator.php',
        '\RecursiveDirectoryIterator' => 'https://www.php.net/manual/en/class.recursivedirectoryiterator.php',
        '\RecursiveFilterIterator' => 'https://www.php.net/manual/en/class.recursivefilteriterator.php',
        '\RecursiveIteratorIterator' => 'https://www.php.net/manual/en/class.recursiveiteratoriterator.php',
        '\RecursiveRegexIterator' => 'https://www.php.net/manual/en/class.recursiveregexiterator.php',
        '\RecursiveTreeIterator' => 'https://www.php.net/manual/en/class.recursivetreeiterator.php',
        '\RegexIterator' => 'https://www.php.net/manual/en/class.regexiterator.php',
        '\SplFileInfo' => 'https://www.php.net/manual/en/class.splfileinfo.php',
        '\SplFileObject' => 'https://www.php.net/manual/en/class.splfileobject.php',
        '\SplTempFileObject' => 'https://www.php.net/manual/en/class.spltempfileobject.php',
        '\ArrayObject' => 'https://www.php.net/manual/en/class.arrayobject.php',
        '\JsonException' => 'https://www.php.net/manual/en/class.jsonexception.php',
        '\JsonSerializable' => 'https://www.php.net/manual/en/class.jsonserializable.php',
        '\PhpToken' => 'https://www.php.net/manual/en/class.phptoken.php',
        '\DateTime' => 'https://www.php.net/manual/en/class.datetime.php',
        '\DateTimeImmutable' => 'https://www.php.net/manual/en/class.datetimeimmutable.php',
        '\DateTimeInterface' => 'https://www.php.net/manual/en/class.datetimeinterface.php',
        '\DateTimeZone' => 'https://www.php.net/manual/en/class.datetimezone.php',
        '\DateInterval' => 'https://www.php.net/manual/en/class.dateinterval.php',
        '\DatePeriod' => 'https://www.php.net/manual/en/class.dateperiod.php',
        '\CurlHandle' => 'https://www.php.net/manual/en/class.curlhandle.php',
        '\CurlMultiHandle' => 'https://www.php.net/manual/en/class.curlmultihandle.php',
        '\CurlShareHandle' => 'https://www.php.net/manual/en/class.curlsharehandle.php',
        '\CURLFile' => 'https://www.php.net/manual/en/class.curlfile.php',
        '\Memcache' => 'https://www.php.net/manual/en/class.memcache.php',
        '\Memcached' => 'https://www.php.net/manual/en/class.memcached.php',
        '\SimpleXMLElement' => 'https://www.php.net/manual/en/class.simplexmlelement.php',
        '\SimpleXMLIterator' => 'https://www.php.net/manual/en/class.simplexmliterator.php',
        '\DOMAttr' => 'https://www.php.net/manual/en/class.domattr.php',
        '\DOMCdataSection' => 'https://www.php.net/manual/en/class.domcdatasection.php',
        '\DOMCharacterData' => 'https://www.php.net/manual/en/class.domcharacterdata.php',
        '\DOMChildNode' => 'https://www.php.net/manual/en/class.domchildnode.php',
        '\DOMComment' => 'https://www.php.net/manual/en/class.domcomment.php',
        '\DOMDocument' => 'https://www.php.net/manual/en/class.domdocument.php',
        '\DOMDocumentFragment' => 'https://www.php.net/manual/en/class.domdocumentfragment.php',
        '\DOMDocumentType' => 'https://www.php.net/manual/en/class.domdocumenttype.php',
        '\DOMElement' => 'https://www.php.net/manual/en/class.domelement.php',
        '\DOMEntity' => 'https://www.php.net/manual/en/class.domentity.php',
        '\DOMEntityReference' => 'https://www.php.net/manual/en/class.domentityreference.php',
        '\DOMException' => 'https://www.php.net/manual/en/class.domexception.php',
        '\DOMImplementation' => 'https://www.php.net/manual/en/class.domimplementation.php',
        '\DOMNamedNodeMap' => 'https://www.php.net/manual/en/class.domnamednodemap.php',
        '\DOMNode' => 'https://www.php.net/manual/en/class.domnode.php',
        '\DOMNodeList' => 'https://www.php.net/manual/en/class.domnodelist.php',
        '\DOMNotation' => 'https://www.php.net/manual/en/class.domnotation.php',
        '\DOMParentNode' => 'https://www.php.net/manual/en/class.domparentnode.php',
        '\DOMProcessingInstruction' => 'https://www.php.net/manual/en/class.domprocessinginstruction.php',
        '\DOMText' => 'https://www.php.net/manual/en/class.domtext.php',
        '\DOMXPath' => 'https://www.php.net/manual/en/class.domxpath.php',
    ];

    public static function getSubscribedEvents(): array
    {
        return [
            OnGettingResourceLink::class => 'onGettingResourceLink',
        ];
    }

    final public function onGettingResourceLink(OnGettingResourceLink $event): void
    {
        if (!$event->getResourceUrl()) {
            $resourceName = $event->getResourceName();
            if (array_key_exists($resourceName, self::$builtInUrls)) {
                $event->setResourceUrl(self::$builtInUrls[$resourceName]);
            } elseif (!str_starts_with($resourceName, '\\') && array_key_exists("\\{$resourceName}", self::$builtInUrls)) {
                $event->setResourceUrl(self::$builtInUrls["\\{$resourceName}"]);
            }
        }
    }
}
