Imports MySql.Data.MySqlClient

Public Class Attachments
    Dim MysqlConn As MySqlConnection
    Dim myCommand As New MySqlCommand
    Dim myAdapter As New MySqlDataAdapter
    Dim myDataSet As New DataSet
    Dim myData As New DataTable
    Dim SQL As String
    Private Sub Button2_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button2.Click
        Dim mResult
        Dim ObjConnection As MySqlConnection
        ObjConnection = New MySqlConnection()
        mResult = MsgBox("You are really want to delete the selected record?", _
        vbYesNo + vbQuestion, "Removal Confirmation")
        If mResult = vbNo Then
            Exit Sub
        End If
        ObjConnection.ConnectionString = "server=localhost;" & "user id=root;" & "password=;" & "database=printdoc"
        ObjConnection.Open()
        Try
            Dim ObjCommand As New MySqlCommand
            ObjCommand.Connection = ObjConnection
            ObjCommand.CommandText = "delete from docinfo where userid ='" & Me.DataGridView1.CurrentRow.Cells(0).Value & "'"
            ObjCommand.ExecuteNonQuery()
        Finally
            ObjConnection.Close()
        End Try
        Me.DataGridView1.Rows.Remove(Me.DataGridView1.CurrentRow)
    End Sub

    Private Sub Attachments_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        MysqlConn = New MySqlConnection()
        SQL = "(SELECT * FROM docinfo where userid =( SELECT userid FROM userinfo where username = '" & Login.UsernameTextBox.Text & "'))"

        MysqlConn.ConnectionString = "server=localhost;" & "user id=root;" & "password=;" & "database=printdoc"
        Try
            MysqlConn.Open()
            myCommand.Connection = MysqlConn
            myCommand.CommandText = SQL
            myAdapter.SelectCommand = myCommand
            myAdapter.Fill(myData)
            DataGridView1.DataSource = myData
        Catch myerror As MySqlException
            MessageBox.Show("Cannot connect to database: " & myerror.Message)
        Finally
            MysqlConn.Close()
            MysqlConn.Dispose()
        End Try
    End Sub
    Private Sub Button3_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button3.Click
        Me.Hide()
        Login.UsernameTextBox.Clear()
        Login.TextBox1.Clear()
        Login.Show()

    End Sub
End Class


