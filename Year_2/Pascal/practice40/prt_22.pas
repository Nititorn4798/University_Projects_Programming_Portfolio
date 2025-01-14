program prt_22;
uses
  crt;
var
  NumberA : Integer;
  NumberB : Integer;
begin
  ClrScr;
  Write('Input First Number : ');
  read(NumberA);
  Write('Input Second Number : ');
  read(NumberB);
  if (NumberA / 2) = NumberB then
    WriteLn(NumberA, ' is product of ', NumberB);
  ReadLn;
end.