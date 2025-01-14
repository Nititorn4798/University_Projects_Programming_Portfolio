program pasreview;
uses
	crt;
var
	s : Integer;
	prt : Integer;
	addr : array[1..10] of Integer;
	info : array[1..10] of String;
	link : array[1..10] of Integer;
	inputdata : String;
	i : Integer;

begin
	link[1] := -1;
	repeat
		WriteLn('		Select');
		WriteLn('1.Edit link list');
		WriteLn('2.Insert link list');
		WriteLn('3.Append link list');
		WriteLn('4.Delete link list');
		WriteLn('5.Exit Program');
		Write('>>> ');
		readln(s);

		if (s = 3) then
			begin
				prt := 1;
				while link[prt] <> -1 do
				begin
					prt := prt + 1;
					WriteLn('Prt : ',prt);
				end;
				repeat
					prt := prt + 1;
					link[prt-1] := prt;
					addr[prt] := prt;
					Write('Input Some data (addr = ',addr[prt],') >>> ');
					Readln(inputdata);
					info[prt] := inputdata;
					link[prt] := -1;
					Break
				until False;
			end;

		if (s = 1) then
			begin
				prt := 1;
				Write('Input select data to edit >>> ');
				Readln(inputdata);
				while info[prt] <> inputdata do
				begin
					prt := prt + 1;
					WriteLn('Prt : ',prt);
				end;
				repeat
					Write('Input Some New data (addr = ',addr[prt],') >>> ');
					Readln(inputdata);
					info[prt] := inputdata;
					Break
				until False;
			end;
		if (s = 5) then
			break;
		WriteLn('');
		for i := 1 to 10 do
			WriteLn('prt : ', i ,' addr : ',addr[i],' info : ',info[i],' link : ',link[i]);
	until False;

end.