namespace MyAppTools2
{
    partial class MyAppTools
    {
        /// <summary>
        ///  Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        ///  Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        ///  Required method for Designer support - do not modify
        ///  the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            cmbTitleName = new ComboBox();
            lblTitleName = new Label();
            lblShowName = new Label();
            txtName = new TextBox();
            txtLastName = new TextBox();
            txtNickName = new TextBox();
            txtAge = new TextBox();
            lblName = new Label();
            lblLastName = new Label();
            lblNickName = new Label();
            lblAge = new Label();
            btnShow = new Button();
            lstListNameFullDetail = new ListBox();
            lblSelectedListBox = new Label();
            txtSelectedLst = new TextBox();
            numericUpDown1 = new NumericUpDown();
            label1 = new Label();
            maskedTextBox1 = new MaskedTextBox();
            btnShowMask = new Button();
            gpGender = new GroupBox();
            rbtnFemale = new RadioButton();
            rbtnMale = new RadioButton();
            ((System.ComponentModel.ISupportInitialize)numericUpDown1).BeginInit();
            gpGender.SuspendLayout();
            SuspendLayout();
            // 
            // cmbTitleName
            // 
            cmbTitleName.FormattingEnabled = true;
            cmbTitleName.Items.AddRange(new object[] { "นาย", "นาง", "นางสาว", "เด็กชาย", "เด็กหญิง" });
            cmbTitleName.Location = new Point(230, 65);
            cmbTitleName.Name = "cmbTitleName";
            cmbTitleName.Size = new Size(140, 23);
            cmbTitleName.TabIndex = 0;
            cmbTitleName.Text = "(กรุณาเลือกคำนำหน้าชื่อ)";
            cmbTitleName.SelectedIndexChanged += cmbTitleName_SelectedIndexChanged;
            // 
            // lblTitleName
            // 
            lblTitleName.AutoSize = true;
            lblTitleName.Location = new Point(161, 68);
            lblTitleName.Name = "lblTitleName";
            lblTitleName.Size = new Size(63, 15);
            lblTitleName.TabIndex = 1;
            lblTitleName.Text = "คำนำหน้าชื่อ";
            // 
            // lblShowName
            // 
            lblShowName.AutoSize = true;
            lblShowName.Font = new Font("Segoe UI", 9F);
            lblShowName.Location = new Point(230, 291);
            lblShowName.Name = "lblShowName";
            lblShowName.Size = new Size(29, 15);
            lblShowName.TabIndex = 2;
            lblShowName.Text = "พื้นที่";
            // 
            // txtName
            // 
            txtName.Location = new Point(230, 94);
            txtName.Name = "txtName";
            txtName.Size = new Size(140, 23);
            txtName.TabIndex = 3;
            // 
            // txtLastName
            // 
            txtLastName.Location = new Point(230, 123);
            txtLastName.Name = "txtLastName";
            txtLastName.Size = new Size(140, 23);
            txtLastName.TabIndex = 4;
            // 
            // txtNickName
            // 
            txtNickName.Location = new Point(230, 152);
            txtNickName.Name = "txtNickName";
            txtNickName.Size = new Size(140, 23);
            txtNickName.TabIndex = 5;
            // 
            // txtAge
            // 
            txtAge.Location = new Point(230, 181);
            txtAge.Name = "txtAge";
            txtAge.Size = new Size(140, 23);
            txtAge.TabIndex = 6;
            // 
            // lblName
            // 
            lblName.AutoSize = true;
            lblName.Location = new Point(161, 97);
            lblName.Name = "lblName";
            lblName.Size = new Size(20, 15);
            lblName.TabIndex = 7;
            lblName.Text = "ชื่อ";
            // 
            // lblLastName
            // 
            lblLastName.AutoSize = true;
            lblLastName.Location = new Point(161, 126);
            lblLastName.Name = "lblLastName";
            lblLastName.Size = new Size(45, 15);
            lblLastName.TabIndex = 8;
            lblLastName.Text = "นามสกุล";
            // 
            // lblNickName
            // 
            lblNickName.AutoSize = true;
            lblNickName.Location = new Point(161, 155);
            lblNickName.Name = "lblNickName";
            lblNickName.Size = new Size(36, 15);
            lblNickName.TabIndex = 9;
            lblNickName.Text = "ชื่อเล่น";
            // 
            // lblAge
            // 
            lblAge.AutoSize = true;
            lblAge.Location = new Point(161, 184);
            lblAge.Name = "lblAge";
            lblAge.Size = new Size(24, 15);
            lblAge.TabIndex = 10;
            lblAge.Text = "อายุ";
            // 
            // btnShow
            // 
            btnShow.Location = new Point(230, 256);
            btnShow.Name = "btnShow";
            btnShow.Size = new Size(112, 32);
            btnShow.TabIndex = 11;
            btnShow.Text = "บันทึก";
            btnShow.UseVisualStyleBackColor = true;
            btnShow.Click += btnShow_Click;
            // 
            // lstListNameFullDetail
            // 
            lstListNameFullDetail.FormattingEnabled = true;
            lstListNameFullDetail.ItemHeight = 15;
            lstListNameFullDetail.Location = new Point(500, 65);
            lstListNameFullDetail.Name = "lstListNameFullDetail";
            lstListNameFullDetail.Size = new Size(211, 139);
            lstListNameFullDetail.TabIndex = 12;
            lstListNameFullDetail.SelectedIndexChanged += lstListNameFullDetail_SelectedIndexChanged;
            // 
            // lblSelectedListBox
            // 
            lblSelectedListBox.AutoSize = true;
            lblSelectedListBox.Font = new Font("Segoe UI", 9F);
            lblSelectedListBox.Location = new Point(161, 345);
            lblSelectedListBox.Name = "lblSelectedListBox";
            lblSelectedListBox.Size = new Size(69, 15);
            lblSelectedListBox.TabIndex = 13;
            lblSelectedListBox.Text = "พื้นที่สิ่งที่เลือก";
            // 
            // txtSelectedLst
            // 
            txtSelectedLst.Location = new Point(230, 342);
            txtSelectedLst.Name = "txtSelectedLst";
            txtSelectedLst.Size = new Size(270, 23);
            txtSelectedLst.TabIndex = 14;
            txtSelectedLst.TextChanged += txtSelectedLst_TextChanged;
            // 
            // numericUpDown1
            // 
            numericUpDown1.Location = new Point(230, 212);
            numericUpDown1.Name = "numericUpDown1";
            numericUpDown1.Size = new Size(140, 23);
            numericUpDown1.TabIndex = 15;
            // 
            // label1
            // 
            label1.AutoSize = true;
            label1.Location = new Point(161, 214);
            label1.Name = "label1";
            label1.Size = new Size(63, 15);
            label1.TabIndex = 16;
            label1.Text = "จำนวนพี่น้อง";
            // 
            // maskedTextBox1
            // 
            maskedTextBox1.Location = new Point(638, 414);
            maskedTextBox1.Mask = "000-00-0000";
            maskedTextBox1.Name = "maskedTextBox1";
            maskedTextBox1.Size = new Size(69, 23);
            maskedTextBox1.TabIndex = 17;
            // 
            // btnShowMask
            // 
            btnShowMask.Location = new Point(713, 414);
            btnShowMask.Name = "btnShowMask";
            btnShowMask.Size = new Size(75, 23);
            btnShowMask.TabIndex = 18;
            btnShowMask.Text = "Mask";
            btnShowMask.UseVisualStyleBackColor = true;
            // 
            // gpGender
            // 
            gpGender.Controls.Add(rbtnFemale);
            gpGender.Controls.Add(rbtnMale);
            gpGender.Location = new Point(500, 214);
            gpGender.Name = "gpGender";
            gpGender.Size = new Size(211, 74);
            gpGender.TabIndex = 19;
            gpGender.TabStop = false;
            gpGender.Text = "เพศ";
            // 
            // rbtnFemale
            // 
            rbtnFemale.AutoSize = true;
            rbtnFemale.Location = new Point(14, 42);
            rbtnFemale.Name = "rbtnFemale";
            rbtnFemale.Size = new Size(47, 19);
            rbtnFemale.TabIndex = 1;
            rbtnFemale.Text = "หญิง";
            rbtnFemale.UseVisualStyleBackColor = true;
            // 
            // rbtnMale
            // 
            rbtnMale.AutoSize = true;
            rbtnMale.Checked = true;
            rbtnMale.Location = new Point(14, 22);
            rbtnMale.Name = "rbtnMale";
            rbtnMale.Size = new Size(43, 19);
            rbtnMale.TabIndex = 0;
            rbtnMale.TabStop = true;
            rbtnMale.Text = "ชาย";
            rbtnMale.UseVisualStyleBackColor = true;
            // 
            // MyAppTools
            // 
            AutoScaleDimensions = new SizeF(7F, 15F);
            AutoScaleMode = AutoScaleMode.Font;
            ClientSize = new Size(800, 450);
            Controls.Add(gpGender);
            Controls.Add(btnShowMask);
            Controls.Add(maskedTextBox1);
            Controls.Add(label1);
            Controls.Add(numericUpDown1);
            Controls.Add(txtSelectedLst);
            Controls.Add(lblSelectedListBox);
            Controls.Add(lstListNameFullDetail);
            Controls.Add(btnShow);
            Controls.Add(lblAge);
            Controls.Add(lblNickName);
            Controls.Add(lblLastName);
            Controls.Add(lblName);
            Controls.Add(txtAge);
            Controls.Add(txtNickName);
            Controls.Add(txtLastName);
            Controls.Add(txtName);
            Controls.Add(lblShowName);
            Controls.Add(lblTitleName);
            Controls.Add(cmbTitleName);
            Name = "MyAppTools";
            Text = "MyAppTools";
            Load += MyAppTools_Load;
            ((System.ComponentModel.ISupportInitialize)numericUpDown1).EndInit();
            gpGender.ResumeLayout(false);
            gpGender.PerformLayout();
            ResumeLayout(false);
            PerformLayout();
        }

        #endregion

        private ComboBox cmbTitleName;
        private Label lblTitleName;
        private Label lblShowName;
        private TextBox txtName;
        private TextBox txtLastName;
        private TextBox txtNickName;
        private TextBox txtAge;
        private Label lblName;
        private Label lblLastName;
        private Label lblNickName;
        private Label lblAge;
        private Button btnShow;
        private ListBox lstListNameFullDetail;
        private Label lblSelectedListBox;
        private TextBox txtSelectedLst;
        private NumericUpDown numericUpDown1;
        private Label label1;
        private MaskedTextBox maskedTextBox1;
        private Button btnShowMask;
        private GroupBox gpGender;
        private RadioButton rbtnFemale;
        private RadioButton rbtnMale;
    }
}
