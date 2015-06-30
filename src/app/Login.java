package app;



import java.io.IOException;
import java.io.UnsupportedEncodingException;
import java.util.ArrayList;

import org.apache.commons.codec.StringEncoder;
import org.apache.http.Consts;
import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.client.utils.URLEncodedUtils;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.CloseableHttpClient;
import org.apache.http.impl.client.HttpClientBuilder;
import org.apache.http.impl.client.LaxRedirectStrategy;
import org.apache.http.message.BasicNameValuePair;
import org.apache.http.util.EntityUtils;
import org.eclipse.swt.SWT;
import org.eclipse.swt.events.SelectionAdapter;
import org.eclipse.swt.events.SelectionEvent;
import org.eclipse.swt.layout.RowLayout;
import org.eclipse.swt.widgets.Button;
import org.eclipse.swt.widgets.Display;
import org.eclipse.swt.widgets.Event;
import org.eclipse.swt.widgets.Listener;
import org.eclipse.swt.widgets.Shell;
import org.jsoup.Jsoup;
import org.jsoup.nodes.Document;
import org.jsoup.nodes.Element;
import org.jsoup.select.Elements;


import com.google.gson.Gson;

public class Login
{
	private static CloseableHttpClient httpClient = null;
	
	public static void main(String[] args)
	{
		httpClient = HttpClientBuilder.create().build();
		// TODO Auto-generated method stub
	    Display display = new Display();
	    Shell shell = new Shell(display);
	    shell.setSize(300, 200);
	    shell.setText("login Example");
	    shell.setLayout(new RowLayout());

	    final Button btnLogin = new Button(shell, SWT.PUSH);
	    btnLogin.setText("登入");
	    
	    final Button btnParser = new Button(shell, SWT.PUSH);
	    btnParser.setText("解析會員資料");
	    
	    final Button btnGsonReceive = new Button(shell, SWT.PUSH);
	    btnGsonReceive.setText("接收資料");
	    
	    final Button btnGsonSend = new Button(shell, SWT.PUSH);
	    btnGsonSend.setText("傳送資料");

	    btnLogin.addSelectionListener(new SelectionAdapter()
	    {
			@Override
			public void widgetSelected(SelectionEvent e)
			{
				try {
					//CloseableHttpClient httpClient = HttpClientBuilder.create().build();
					// 登入頁面
					HttpPost httpPost = new HttpPost("http://10.0.1.95/yueh_php/CI/index.php/Login/loginResponse");
					// post 的資料
					ArrayList<NameValuePair> arrayList = new ArrayList<NameValuePair>();
					arrayList.add(new BasicNameValuePair("account", "admin"));
					arrayList.add(new BasicNameValuePair("pass", "111"));
					// 設定eneity
					httpPost.setEntity(new UrlEncodedFormEntity(arrayList, Consts.UTF_8));
					
					HttpResponse httpResponse = httpClient.execute(httpPost);
					
					int iStatusCode = httpResponse.getStatusLine().getStatusCode();
					HttpEntity httpEntity = httpResponse.getEntity();
					System.out.println("CODE: " + iStatusCode);
					if(iStatusCode == 200)
					{
						System.out.println(EntityUtils.toString(httpEntity, "UTF-8"));
					}
					
					//httpClient.close();
				} catch (UnsupportedEncodingException e1) {
					// TODO Auto-generated catch block
					e1.printStackTrace();
				} catch (ClientProtocolException e1) {
					// TODO Auto-generated catch block
					e1.printStackTrace();
				} catch (IOException e1) {
					// TODO Auto-generated catch block
					e1.printStackTrace();
				}
				
				
			}
		});
	    
	    btnParser.addSelectionListener(new SelectionAdapter()
	    {
			@Override
			public void widgetSelected(SelectionEvent e)
			{
				HttpGet httpGet = new HttpGet("http://10.0.1.95/yueh_php/CI/index.php/UserUseing/Allmodify");
				
				HttpResponse httpResponse;
				try {
					httpResponse = httpClient.execute(httpGet);
					
					int iStatusCode = httpResponse.getStatusLine().getStatusCode();
					HttpEntity httpEntity = httpResponse.getEntity();
					System.out.println("CODE: " + iStatusCode);
					if(iStatusCode == 200)
					{
						//System.out.println(EntityUtils.toString(httpEntity, "UTF-8"));
						Document document = Jsoup.parse(EntityUtils.toString(httpEntity, "UTF-8"));
						
						/*
						document.getElementById(id)
						document.getElementsByClass(className)
						document.getElementsByTag("table")
						*/
						Element tableElement = document.getElementById("myTable");
						Elements trElements = tableElement.getElementsByTag("tr");
						for(Element trElement : trElements)
						{
							System.out.println(trElement.getElementsByTag("td").get(0).text());
						}
					}
				} catch (IOException e1) {
					// TODO Auto-generated catch block
					e1.printStackTrace();
				}
			}
		});
	    
	    btnGsonReceive.addSelectionListener(new SelectionAdapter()
	    {
			@Override
			public void widgetSelected(SelectionEvent e)
			{
				HttpGet httpGet = new HttpGet("http://localhost/MyPHP/shihyi/index.php/Api");
				httpGet.setHeader("Accept", "application/json");
				httpGet.setHeader("Content-type", "application/json");
				
				Gson gson = new Gson();
				
				String sResponse = null;
				try
				{
					HttpResponse httpResponse = httpClient.execute(httpGet);
					HttpEntity httpEntity = httpResponse.getEntity();
					sResponse = EntityUtils.toString(httpEntity, "UTF-8");
					int iStatusCode = httpResponse.getStatusLine().getStatusCode();
					System.out.println("CODE: " + iStatusCode);
					if(iStatusCode == 200)
					{
						  //建立Book物件
						  Data book = new Data();
						  book.setNo(1);
						  book.setPassword("1234");
						  //將Book物件轉成JSON
						  String json = gson.toJson(book);
						  //把JSON格式的資料秀出來
						  System.out.println(json);
						  //輸出結果：{"isbn":"956-987236-1","name":"Java歷險記","price":550}

						  
						System.out.println(sResponse);
						Receive gsonReceive = gson.fromJson(sResponse, Receive.class);
						ArrayList<Data> aryListData = gsonReceive.getData();
						System.out.println(gsonReceive.getData());
						for(Data data : aryListData)
						{
							System.out.println(data.getUser());
						}
					}
					httpGet.releaseConnection();
				} catch (ClientProtocolException e1) {
					// TODO Auto-generated catch block
					e1.printStackTrace();
				} catch (IOException e1) {
					// TODO Auto-generated catch block
					e1.printStackTrace();
				}
			}
		});
	    
	    btnGsonSend.addSelectionListener(new SelectionAdapter()
	    {
			@Override
			public void widgetSelected(SelectionEvent e)
			{
				// prepare send data
				Data data = new Data();
				data.setUser("test1");
				data.setPassword("1111");
				
				HttpPost httpPost = new HttpPost("http://localhost/MyPHP/shihyi/index.php/Api");
				httpPost.setHeader("Accept", "application/json");
				httpPost.setHeader("Content-type", "application/json");
				// new gson
				Gson gson = new Gson();
				String sJSON = gson.toJson(data);
				// set post data
				StringEntity stringEntity = new StringEntity(sJSON, "UTF-8");
				httpPost.setEntity(stringEntity);
				
				String sResponse = null;
				try
				{
					
					HttpResponse httpResponse = httpClient.execute(httpPost);
					HttpEntity httpEntity = httpResponse.getEntity();
					sResponse = EntityUtils.toString(httpEntity, "UTF-8");
					int iStatusCode = httpResponse.getStatusLine().getStatusCode();
					System.out.println("CODE: " + iStatusCode);
					if(iStatusCode == 200)
					{
						System.out.println(sResponse);
					}
					httpPost.releaseConnection();
				} catch (ClientProtocolException e1) {
					// TODO Auto-generated catch block
					e1.printStackTrace();
				} catch (IOException e1) {
					// TODO Auto-generated catch block
					e1.printStackTrace();
				}
			}
		});
	    
		shell.addListener(SWT.Close, new Listener() {
			public void handleEvent(Event event) {
				try {
					httpClient.close();
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
			}
		});
	    
	    shell.open();
	    while (!shell.isDisposed()) {
	      if (!display.readAndDispatch())
	        display.sleep();
	    }
	    display.dispose();
	}

}
