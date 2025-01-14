program prt_18;
uses
  crt;
var
  Number : Integer;
begin
  ClrScr;
  Write('Input Number : ');
  read(Number);
  if (Number mod 2) = 0 then
    begin
      WriteLn('Even Number')
    end
  else
    begin
      WriteLn('Odd Number')
    end;
  ReadLn;
end.