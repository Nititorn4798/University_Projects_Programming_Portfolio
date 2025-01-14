program prt_7;
uses
  crt;
var
  days : Real;
  q : Char;
function second(days:Real):Real;
begin
  second := ((days * 24) * 60) * 60;
end;

begin
  repeat
    ClrScr;
    Write('Input Days : ');
    ReadLn(days);
    WriteLn('Second Is : ',second(days):0:2);
    Write('Do you want to use the program again? [Y/N]: ');
    ReadLn(q);
  until (UpCase(q) <> 'Y');
end.