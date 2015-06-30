package app;

import java.util.ArrayList;

public class Receive
{
	ArrayList<Data> Data = new ArrayList<Data>();
	
	public Receive()
	{
		
	}
	
	public void setData(ArrayList<Data> data) {
		this.Data = data;
	}

	public ArrayList<Data> getData()
	{
		return this.Data;
	}
}
