// Using positional arguments:
array_fill(0, 100, 50);
 
// Using named arguments:
array_fill(start_index: 0, num: 100, value: 50);

//example with constructor

class ParamNode extends Node {
    public function __construct(
        public string $name,
        public ExprNode $default = null,
        public TypeNode $type = null,
        public bool $byRef = false,
        public bool $variadic = false,
        Location $startLoc = null,
        Location $endLoc = null,
    ) {
        parent::__construct($startLoc, $endLoc);
    }
}

new ParamNode("test", null, null, false, true);
// becomes:
new ParamNode("test", variadic: true);
 
new ParamNode($name, null, null, $isVariadic, $passByRef);
// or was it?
new ParamNode($name, null, null, $passByRef, $isVariadic);
// becomes
new ParamNode($name, variadic: $isVariadic, byRef: $passByRef);
// or
new ParamNode($name, byRef: $passByRef, variadic: $isVariadic);
// and it no longer matters!

// for clasess and objects and inheritance
class A {
    public function method($a) {}
}
class B extends A {
    public function method(...$args) {}
}
class C extends B {
    public function method($c = null, ...$args) {}
}
 
(new B)->method(a: 42);
(new C)->method(a: 42);
