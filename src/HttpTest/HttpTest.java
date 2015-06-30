package HttpTest;

import java.io.IOException;
import java.io.UnsupportedEncodingException;
import java.util.ArrayList;

import org.apache.commons.codec.StringEncoder;
import org.apache.http.Consts;
import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.HttpStatus;
import org.apache.http.HttpVersion;
import org.apache.http.NameValuePair;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.client.utils.URLEncodedUtils;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.CloseableHttpClient;
import org.apache.http.impl.client.HttpClientBuilder;
import org.apache.http.impl.client.LaxRedirectStrategy;
import org.apache.http.message.BasicHttpResponse;
import org.apache.http.message.BasicNameValuePair;
import org.apache.http.util.EntityUtils;
import org.eclipse.swt.SWT;
import org.eclipse.swt.events.SelectionAdapter;
import org.eclipse.swt.events.SelectionEvent;
import org.eclipse.swt.layout.RowLayout;
import org.eclipse.swt.widgets.Button;
import org.eclipse.swt.widgets.Display;
import org.eclipse.swt.widgets.Shell;

public class HttpTest
{
	public static void main(String[] args)
	{
		// TODO Auto-generated method stub
	    Display display = new Display();
	    Shell shell = new Shell(display);
	    shell.setSize(300, 200);
	    shell.setText("login Example");
	    shell.setLayout(new RowLayout());
	    
	    final Button button = new Button(shell, SWT.PUSH);
	    button.setText("登入"); 

	    // 登入
	    button.addSelectionListener(new SelectionAdapter()
	    {
			@Override
			public void widgetSelected(SelectionEvent e)
			{
				try {
					 CloseableHttpClient httpClient = HttpClientBuilder.create().build();
					// 登入頁面
					HttpPost httpPost = new HttpPost("http://10.0.1.95/yueh_php/CI/index.php/Login/loginResponse");
					// post 的資料
					ArrayList<NameValuePair> arrayList = new ArrayList<NameValuePair>();
					arrayList.add(new BasicNameValuePair("account", "admin"));
					arrayList.add(new BasicNameValuePair("pass", "11ascxsa21"));
					
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

					httpClient.close();
				} catch (UnsupportedEncodingException e1) {
					e1.printStackTrace();
				} catch (ClientProtocolException e1) {
					e1.printStackTrace();
				} catch (IOException e1) {
					e1.printStackTrace();
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
