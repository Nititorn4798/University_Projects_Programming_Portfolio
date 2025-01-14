program prt_40;
uses
  crt;
var
  i : Integer;
begin
  ClrScr;
  For i := 1 to 12 do
  begin
    WriteLn('12 x ', i, ' = ', 12 * i);
  end;
  ReadLn;
end.