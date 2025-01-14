program prt_5;
uses
  crt;
var
  temp_c : Real;
  q : String;
  x : Boolean = False;
function tempf(temp_c:Real):Real;
  var
    temp_f : Real;
  begin
    temp_f := (temp_c * (9 / 5)) + 32;
    tempf := temp_f;
  end;
begin
  repeat
    ClrScr;
    Write('Input Your Temperature in Celsius : ');
    ReadLn(temp_c);
    WriteLn('Temperature in Fahrenheit is ',tempf(temp_c):0:2,' F');
    Write('Do you want to use program again ? [Y,N] : ');
    ReadLn(q);
    if (q = 'y') or (q = 'Y') then
      x := False
    else
      x := True;
  until (x);
end.
