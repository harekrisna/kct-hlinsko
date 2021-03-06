<?php
namespace Forms\DatePicker;

use Nette\Forms\Container;
use Nette\Forms\Controls\TextInput;
use Nette\Utils\DateTime;
/**
 * DatePicker Input Control
 *
 * @author Radek Dostál
 */
class DatePicker extends TextInput
{
  /**
   * Default format
   *
   * @var string
   */
  private $format = 'd.m.Y';
  /**
   * State
   *
   * @var bool
   */
  private $readonly = TRUE;
  /**
   * Initialization
   *
   * @param string $label label
   * @param int $maxLength maximum count of chars
   */
  public function __construct($label = NULL, $maxLength = NULL)
  {
    parent::__construct($label, $maxLength);
  }
  /**
   * Sets custom format
   *
   * @param string $format format
   * @return self
   */
  public function setFormat($format)
  {
    $this->format = $format;
    return $this;
  }
  /**
   * Returns date
   *
   * @return mixed
   */
  public function getValue()
  {
    if (strlen($this->value) > 0)
      return DateTime::createFromFormat($this->format, $this->value);
    return $this->value;
  }
  /**
   * Sets date
   *
   * @param string $value date
   * @return void
   */
  public function setValue($value)
  {
    if ($value instanceof \DateTime)
      $value = $value->format($this->format);
    parent::setValue($value);
  }
  /**
   * Sets the date input box to read only and only allow change via the date
   * picker or vice versa, allow changing the field value directly
   *
   * @param bool $state
   * @return self
   */
  public function setReadOnly($state)
  {
    $this->readonly = (bool) $state;
    return $this;
  }
  /**
   * Generates control's HTML element
   *
   * @return \Nette\Utils\Html
   */
  public function getControl()
  {
    $control = parent::getControl();
    $control->class = 'datepicker form-control';
    $control->readonly = $this->readonly;
    return $control;
  }
  /**
   * Registers this control
   *
   * @param string $format format
   * @return self
   */
  public static function register($format = NULL)
  {
    Container::extensionMethod('addDatePicker', function($container, $name, $label = NULL, $maxLength = NULL) use ($format)
    {
      $picker = $container[$name] = new DatePicker($label, $maxLength);
      if ($format !== NULL)
        $picker->setFormat($format);
      return $picker;
    });
  }
}