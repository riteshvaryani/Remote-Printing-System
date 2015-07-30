Imports MySql.Data.MySqlClient


Public Class Login
    Dim MysqlConn As MySqlConnection
    Dim myCommand As New MySqlCommand
    Dim myAdapter As New MySqlDataAdapter
    Dim myData As New DataTable
    Dim SQL As String

    Private Sub OK_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles OK.Click
        If UsernameTextBox.Text = "" Or TextBox1.Text = "" Then
            MsgBox("Enter UserName and Password Moron")
        Else
            Dim MysqlConn As MySqlConnection
            MysqlConn = New MySqlConnection()
            MysqlConn.ConnectionString = "server= localhost;" & "user id=root;" & "password=;" & "database=printdoc"
            Try

                MysqlConn.Open()
                'MessageBox.Show("Connection to Database has been opened.")
                Dim sqlquerry = "Select * From userinfo where username = '" + UsernameTextBox.Text + "' And password= '" + TextBox1.Text + "'"
                myCommand.Connection = MysqlConn
                myCommand.CommandText = sqlquerry
                myAdapter.SelectCommand = myCommand
                Dim mydata As MySqlDataReader
                mydata = myCommand.ExecuteReader
                'To check the Username and password and to validate the login a
                If mydata.HasRows = 0 Then
                    MsgBox("Invalid Login")
                    UsernameTextBox.Clear()
                    TextBox1.Clear()
                Else
                    Me.Hide()
                    Dim F As New Attachments()
                    F.Label3.Text = UsernameTextBox.Text
                    F.Show()
                End If

            Catch myerror As MySqlException
                MessageBox.Show("Cannot connect to database: " & myerror.Message)
            Finally
                MysqlConn.Dispose()
            End Try
        End If
        
    End Sub

    Private Sub Cancel_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Cancel.Click
        UsernameTextBox.Clear()
        TextBox1.Clear()
    End Sub

    Private Sub Button1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button1.Click
        Me.Close()
    End Sub

    Private Sub UsernameTextBox_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles UsernameTextBox.TextChanged

    End Sub

    Private Sub UsernameLabel_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles UsernameLabel.Click

    End Sub
End Class
