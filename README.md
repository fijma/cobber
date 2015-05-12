#Cobber

Cobber is a miniscule PHP web framework, inspired by rack.

```
$app = new Cobber(function($env) { return [200, [], ["G'day mate!"]]; });
$app->run();
```

Cobber accepts your app as a classname, instance, or closure. Just pass it in on instantiation.

Cobber supports middlewares. They can be loaded on instantiation:

```
$middlewares = [['MyMiddleware', ['some', 'optional', 'options']]];
$app = new Cobber($myapp, $middlewares);
$app->run();
```

or added via the add() method:

```
$app = new Cobber($myapp);
$app->add('MyMiddleware', ['some', 'optional', 'options']);
$app->run();