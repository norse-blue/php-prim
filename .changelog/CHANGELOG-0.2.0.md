# Release 0.2.0

Refactoring, improvements and extension method additions.

## Added

- `StringObject::left` and `StringObject::right` extension methods.
- `StringObject::repeat` extension method.
- `StringObject::preffix`, `StringObject::suffix` and `StringObject::surround` extension methods.
- Comparison extension methods for numeric scalar types.
- String type array access.
- [PHP Insights](https://github.com/nunomaduro/phpinsights) to evaluate the code.
- A big chunk of [Underscore PHP](https://anahkiasen.github.io/underscore-php) useful methods (not all methods were implemented, mostly they were string methods).


## Changed

- Rename the `StringObject::is` extension method to `StringObject::regexPatternMatch` that is more descriptive and makes room for the validation `StringObject::is*` extension methods.
- Make `FloatObject` and `IntObject` extend from a `NumericObject` class.
- Make use of strict types in all classes (`declare(strict_types=1)`).
- Make most of the classes final.
- Make `DotArrObject` (and the new `ArrObject`) extend from the `ItemContainer` object.

## Fixed

- Enforce extensibility through implementing the proper contracts. (⊶ #e50c68)
- Now the new `Collections` extension methods are also correctly registered. (⊶ #3de127)

## Improvements

- Here and there small improvements on coding and readability (remove useless parenthesis, remove useless static binding calls, improve the docblocks, etc.).

---

Previous: [Release 0.1.0](CHANGELOG-0.1.0.md)
