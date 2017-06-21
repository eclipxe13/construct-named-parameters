# version 1.1.0
- This does **not break** compatibility with 1.0.0 
- Add interface `CreatableFromArrayInterface` that enforces an static method create(array): $this
- Add interface `ExportableToArrayInterface` that enforces an method toArray(): array
- Add trait `StaticCreateIgnoreCaseTrait` is the same as `StaticCreateTrait` but ignore case on keys
- More test for all changes

# version 1.0.0
- First public release
