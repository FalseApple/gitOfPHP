package gson;

import java.util.ArrayList;

public class Data
{
	int No;
	String Name;
	String passwd;
	ArrayList<family> family = new ArrayList<family>();
	
	public Data()
	{
		//
	}
	
	public void setNo(int _No)
	{
		this.No = _No;
	}
	
	public int getNo()
	{
		return this.No;
	}
	
	public void setName(String _Name)
	{
		this.Name = _Name;
	}
	
	public String getName()
	{
		return this.Name;
	}
	
	public void setPasswd(String _Passwd)
	{
		this.passwd = _Passwd;
	}
	
	public String getPasswd()
	{
		return this.passwd;
	}

	public ArrayList<family> getFamily() {
		return family;
	}

	public void setFamily(ArrayList<family> family) {
		this.family = family;
	}
	
	public class family {
		int No;
		String Name;
		String Phone;

		public family() {
		}

		public String getName() {
			return Name;
		}

		public void setName(String name) {
			Name = name;
		}

		public int getNo() {
			return No;
		}

		public void setNo(int no) {
			No = no;
		}

		public String getPhone() {
			return Phone;
		}

		public void setPhone(String phone) {
			Phone = phone;
		}
	}
}
