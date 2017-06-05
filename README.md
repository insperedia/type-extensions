Php types as objects 
======================

## Example:

echo Str:n("my string ")->trim()->sub(0,2);
$ my

echo Str:n("I like tee")->words[2];
$ like

echo Str:n("I like tee")->words[4];
$ false


