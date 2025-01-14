program prt_5_opt;
uses
  crt;

function CelsiusToFahrenheit(temp_c: Real): Real;
begin
  CelsiusToFahrenheit := (temp_c * 9 / 5) + 32;
end;

var
  temp_c: Real;
  q: Char;

begin
  repeat
    clrscr;
    Write('Input Temperature in Celsius: ');
    ReadLn(temp_c);
    WriteLn('Temperature in Fahrenheit: ', CelsiusToFahrenheit(temp_c):0:2, ' F');
    Write('Do you want to use the program again? [Y/N]: ');
    ReadLn(q);
  until (UpCase(q) <> 'Y');
end.
