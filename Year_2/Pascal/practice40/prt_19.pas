program prt_19;
uses
  crt;
var
  Number : Integer;
begin
  ClrScr;
  Write('Input Number : ');
  read(Number);
  if (Number >= 60) and (Number <= 100) then
  begin
    WriteLn('Pass')
  end
  else if (Number >= 0) and (Number <= 59) then
  begin
    WriteLn('Fail')
  end
  else
  begin
    WriteLn('Out of Range')
  end;
  ReadLn;
end.
