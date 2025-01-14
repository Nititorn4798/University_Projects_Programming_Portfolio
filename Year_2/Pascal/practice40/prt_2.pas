program prt_2;
uses
    crt;
var
    base, height, ret_area : Real;

function triarea(base, height : Real):Real;
var
    area : Real;
begin
    area := 0.5 * base * height;
    triarea := area;
end; (*จบฟังก์ชัน ;*)

begin
    clrscr;
    Write('Input Base >>> ');
    ReadLn(base);
    Write('Input Height >>> ');
    ReadLn(height);
    ret_area := triarea(base, height);
    WriteLn('Triangle Area is : ',ret_area:0:2);
    ReadLn;
end. (*จบโปรแกรม .*)