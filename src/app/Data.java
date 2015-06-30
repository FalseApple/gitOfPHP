package app;

import java.util.ArrayList;

public class Data
{
	int no;
	String user;
	String password;
	ArrayList<Object> family = new ArrayList<Object>();
	
	public Data()
	{
		//
	}

	public int getNo() {
		return no;
	}

	public void setNo(int no) {
		this.no = no;
	}

	public String getUser() {
		return user;
	}

	public void setUser(String user) {
		this.user = user;
	}

	public String getPassword() {
		return password;
	}

	public void setPassword(String password) {
		this.password = password;
	}

	public ArrayList<Object> getFamily() {
		return family;
	}

	public void setFamily(ArrayList<Object> family) {
		this.family = family;
	}

}
