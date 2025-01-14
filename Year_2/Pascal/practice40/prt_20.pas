program prt_20;
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
  if NumberA = NumberB then
  begin
    WriteLn('Equal')
  end
  else
  begin
    WriteLn('Not Equal')
  end;
  ReadLn;
end.
