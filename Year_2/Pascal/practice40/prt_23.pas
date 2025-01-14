program prt_23;
uses
  crt;
var
  NumberA : Integer;
  NumberB : Integer;
  MaxNum : Integer;
begin
  ClrScr;
  Write('Input First Number : ');
  ReadLn(NumberA);
  Write('Input Second Number : ');
  ReadLn(NumberB);
  if NumberA > NumberB then
  begin
    MaxNum := NumberA;
    WriteLn('First Number is Most : ',MaxNum);
  end
  else
  begin
    MaxNum := NumberB;
    WriteLn('Second Number is Most : ',MaxNum);
  end;
  ReadLn;
end.